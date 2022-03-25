<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Mpdf\Mpdf;
use Walletable\Money\Money;

class HomeController extends Controller
{
    /**
     * Boot a new controller instance.
     *
     * @return void
     */
    public function _boot()
    {
        $this->middleware(['auth'])->except('welcome', 'register', 'submitRegistration');
    }

    public function transfer()
    {
        return \view('fund.transfer')->with([
            'title' => 'Transfer funds'
        ]);
    }

    /**
     * Show the users dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function transactions()
    {
        return \view('transaction.index')->with([
            'title' => 'Transactions funds',
            'transactions' => Auth::user()->transactions()->paginate(20),
        ]);
    }

    /**
     * Show the users dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function transaction(Transaction $transaction)
    {
        return \view('transaction.show')->with([
            'title' => 'Transactions funds',
            'transaction' => $transaction,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $wallet = Auth::user()->wallets()->first();
        $query = $user->transactions();
        $credit_today = new Money(340000, $wallet->currency);
        $debit_today = new Money(40000, $wallet->currency);
        $transactions_today = 4;

        return \view('home')->with([
            'title' => 'Dashboard',
            'transactions' => $query->limit(20)->get(),
            'credit_today' => $credit_today,
            'debit_today' => $debit_today,
            'wallet' => $wallet,
            'transactions_today' => $transactions_today,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function statementPreview(Request $request)
    {
        $user = User::findOrFail($request->id);
        $query = $user->transactions();
        $past_due = new Money(1000000, new Currency($user->currency));
        $open_balance = (clone $query)->orderBy('created_at', 'ASC')->first()->balance;
        $close_balance = (clone $query)->first()->balance;
        $total_debit = new Money((clone $query)->whereAction('debit')->sum('amount'), new Currency($user->currency));
        $total_credit = new Money((clone $query)->whereAction('credit')->sum('amount'), new Currency($user->currency));
        $debit_count = (clone $query)->whereAction('debit')->count('id');
        $credit_count = (clone $query)->whereAction('credit')->count('id');

        $view = \view('pdf.statement')->with(
            [
                'user' => $user,
                'address' => 'No. 55, Iceland Pacific Way',
                'branch' => 'No. 55, Iceland Pacific Way',
                'from' => now(),
                'to' => now(),
                'past_due' => $past_due,
                'transactions' => $query->get(),
                'open_balance' => $open_balance,
                'close_balance' => $close_balance,
                'total_debit' => $total_debit,
                'total_credit' => $total_credit,
                'debit_count' => $debit_count,
                'credit_count' => $credit_count,
            ]
        );

        //return base64_encode( file_get_contents( base_path('public/img/lh-head.jpg') ) );
        $mpdf = new Mpdf([
            'tempDir' => base_path('storage/app/mpdf/tmp'),
            'format' => 'A4',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 10,
            'margin_bottom' => 10,
            /* 'margin_header' => 0,
            'margin_footer' => 0 */
        ]);
        $mpdf->useSubstitutions = false;
        $mpdf->WriteHTML($view->render());
        return response()->pdf($mpdf->Output('', 'S'), $user->full_name . '`s account statement');
    }

    public function submitRegistration(Request $request)
    {
        $this->validate($request, $rules = [
            'full_name' => 'required|string|min:3|max:75',
            'email' => ['required', 'email', Rule::unique((new User())->getTable())],
            'phone' => 'required|numeric',
            'username' => 'required|string|min:3|max:15',
            'gender' => ['required', Rule::in(['male', 'female'])],
            'date_of_birth' => 'required|date',
            'occupation' => 'required|string|min:3|max:20',
            'address' => 'required|string|min:3|max:100',
            'state' => 'required|string|min:3|max:20',
            'country' => 'required|string|min:3',
            'zip' => 'required|numeric',
            'account_type' => ['required', 'string', Rule::in([
                'savings',
                'checking',
                'brokerage',
                'money_market',
                'cds',
                'retirement'
            ])],
            'pin' => 'required|numeric',
        ]);

        Mail::to(
            config('site.mail.register'),
            'Registeration Receiver'
        )->queue(new RegistrationMail($request->only(array_keys($rules))));

        return back()->with(
            'success',
            'We have received your account application, We will get back to you.'
        );
    }
}
