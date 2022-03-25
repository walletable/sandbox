<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Models\User;
use App\Walletable\Actions\BankTransferCreditActionData;
use App\Walletable\Actions\BankTransferDebitActionData;
use App\Walletable\Actions\GasActionData;
use Walletable\Facades\Wallet;
use Walletable\Internals\Actions\ActionData;
use Walletable\Money\Money;
use Walletable\Share\Recipient;
use Walletable\Share\Recipients;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'verify' => false,
]);

Route::middleware(['auth', 'must.not.be.blocked'])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('transactions', [HomeController::class, 'transactions'])->name('transactions');
    Route::get('transactions/{transaction}', [HomeController::class, 'transaction'])->name('transaction');

    Route::prefix('account')->name('account.')->group(function () {
        Route::get('', [AccountController::class, 'index'])->name('index');
        Route::get('password', [AccountController::class, 'password'])->name('password');
        Route::get('profile_picture', [AccountController::class, 'profilePicture'])->name('profile-picture');
    });

    Route::prefix('fund')->name('fund.')->group(function () {
        Route::get('transfer', [HomeController::class, 'transfer'])->name('transfer');
    });

    Route::get('/debit/{amount}', function ($amount) {
        /**
         * @var \App\Models\Wallet
         */
        $wallet = Auth::user()->wallets()->first();
        $money = $wallet->amount;
        $currency = $money->getCurrency();

        $money = new Money((float)$amount * 100, $currency);

        dd($wallet->debit($money, 'Stamp Duty and Maintenance: ' . now()->format('M d, h:i A')));
    });

    Route::get('/credit/{amount}', function ($amount) {
        /**
         * @var \App\Models\Wallet
         */
        $wallet = Auth::user()->wallets()->first();
        $money = $wallet->amount;
        $currency = $money->getCurrency();

        $money = new Money((float)$amount * 100, $currency);

        dd($wallet->credit($money, 'Transaction reversal: ' . now()->format('M d, h:i A')));
    });

    Route::get('/user/{type}/{email}/{amount}', function ($type, $email, $amount) {
        /**
         * @var \App\Models\Wallet
         */
        $wallet = User::whereEmail($email)->first()->wallets()->first();
        $money = $wallet->amount;
        $currency = $money->getCurrency();

        $money = new Money((float)$amount * 100, $currency);

        dd($wallet->$type($money, ucfirst($type) . ': ' . now()->format('M d, h:i A')));
    });

    Route::get('/buy_gas/{quantity}/{amount}', function ($quantity, $amount) {
        /**
         * @var \App\Models\Wallet
         */
        $wallet = Auth::user()->wallets()->first();

        $money = $wallet->money((float)$amount * 100);

        dd($wallet->action('gas')->debit($money, new ActionData((int)$quantity)));
    });

    Route::get('/bankcredit/{amount}', function ($amount) {
        /**
         * @var \App\Models\Wallet
         */
        $wallet = Auth::user()->wallets()->first();

        $money = $wallet->money((float)$amount * 100);
        //$fee = $wallet->money((float)$fee * 100);

        dd($wallet->action('bank_transfer')->credit($money, new ActionData(
            'Ilesanmi Eniola',
            '2001538421',
            'Kuda Bank',
            '371',
        ), 'Buy yourself some stuffs'));
    });

    Route::get('/bankdebit/{amount}', function ($amount) {
        /**
         * @var \App\Models\Wallet
         */
        $wallet = Auth::user()->wallets()->first();

        $money = $wallet->money((float)$amount * 100);

        dd($wallet->action('bank_transfer')->debit($money, new ActionData(
            'Ilesanmi Ademola',
            '2001538421',
            'Kuda Bank',
            '371',
            $wallet->money(10000)
        ), 'Money for food stuffs'));
    });

    Route::get('/share/{amount}', function ($amount) {
        /**
         * @var \App\Models\User $user
         * @var \App\Models\Wallet $wallet
         */
        $user = Auth::user();
        $wallet = $user->wallets()->first();

        $users = User::with(['wallets'])->where('id', '<>', $user->id)->get();

        $wallets = $users->reduce(function ($result, $user) {
            $result[] = $user->wallets->first();
            return $result;
        });

        dd($wallet->share(
            Recipients::allocate(
                $wallet->money((float)$amount * 100),
                ...$wallets
            ),
            'Weekly allowance'
        ));
    });

    Route::get('/share/amounts/{amounts}', function ($amounts) {
        /**
         * @var \App\Models\User $user
         * @var \App\Models\Wallet $wallet
         */
        $user = Auth::user();
        $wallet = $user->wallets()->first();
        $amounts = \collect(explode(',', $amounts))->reduce(function ($result, $amount) use ($wallet) {
            $result[] = $wallet->money((float)$amount * 100);
            return $result;
        }, []);

        $users = User::with(['wallets'])->where('id', '<>', $user->id)->take(count($amounts))->get();

        $recipients = $users->reduce(function ($result, $user, $key) use ($amounts) {
            $result[] = new Recipient($user->wallets->first(), $amounts[$key]);
            return $result;
        });

        dd($wallet->share(
            new Recipients(
                ...$recipients
            ),
            'Weekly allowance'
        ));
    });
});
