<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;
use Mpdf\Mpdf;
use Money\Money;
use Money\Currency;

class Statement extends Component
{
    public User $user;

    public $pastDue;

    public $branchAddress;

    public $from;

    public $to;

    public function render()
    {
        return view('livewire.admin.user.statement');
    }

    public function generate()
    {
        $user = $this->user;
        $query = $user->transactions();
        $past_due = new Money((int)$this->pastDue * 100, new Currency($user->currency));
        $open_balance = (clone $query)->orderBy('created_at', 'ASC')->first()->balance;
        $close_balance = (clone $query)->first()->balance;
        $total_debit = new Money((clone $query)->whereAction('debit')->sum('amount'), new Currency($user->currency));
        $total_credit = new Money((clone $query)->whereAction('credit')->sum('amount'), new Currency($user->currency));
        $debit_count = (clone $query)->whereAction('debit')->count('id');
        $credit_count = (clone $query)->whereAction('credit')->count('id');
        $branch = $this->branchAddress;
        $from = (clone $query)->orderBy('created_at', 'ASC')->first()->created_at;
        $to = (clone $query)->first()->created_at;
        $transactions = (clone $query)->get();

        $view = \view('pdf.statement')->with(compact(
            'user',
            'branch',
            'from',
            'to',
            'past_due',
            'transactions',
            'open_balance',
            'close_balance',
            'total_debit',
            'total_credit',
            'debit_count',
            'credit_count'
        ));

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
        $content = $mpdf->Output('', 'S');

        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, $user->full_name . '`s account statement.pdf');
    }
}
