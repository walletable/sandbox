<?php

namespace App\Providers;

use App\Walletable\Actions\BankTransferAction;
use App\Walletable\Actions\GasAction;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;
use Walletable\Facades\Wallet;
use Walletable\Money\Currency;
use Walletable\Money\Money;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IntlMoneyFormatter::class, function (){
            $currencies = new ISOCurrencies();
            $numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
            return new IntlMoneyFormatter($numberFormatter, $currencies);
        });
    }

    /**xxxxxxx
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        $this->registerSchemaMacros();

        Response::macro('pdf', function ($content, $name = null) {
            $headers = [
                'Content-type'        => 'application/pdf',
                'Content-Disposition' => 'attachment;filename="' . ($name ?? 'Generated PDF') . '.pdf"',
            ];

            return Response::make($content, 200, $headers);
        });

        Wallet::action('gas', GasAction::class);
        Wallet::action('bank_transfer', BankTransferAction::class);

        Money::currencies(
            Currency::new('NGN', '₦', 'Naira', 'Kobo', 100, 566),
            Currency::new('USD', '$', 'Dollar', 'Cent', 100, 840)
        );
    }

    private function registerSchemaMacros()
    {
        Blueprint::macro('primaryUuid', function (string $name = 'id') {
            /**
             * @var Blueprint $this
             */
            $this->uuid($name)->primary();
            return $this;
        });

        Blueprint::macro('uniqueUuidMorphs', function (string $name) {
            /**
             * @var Blueprint $this
             */
            $this->uuid($name . '_id');
            $this->string($name . '_type', 100);
            $this->unique([$name . '_id', $name . '_type'], 'unique_' . $name);
        });

        Blueprint::macro('indexedUuidMorphs', function (string $name) {
            /**
             * @var Blueprint $this
             */
            $this->uuid($name . '_id');
            $this->string($name . '_type', 100);
            $this->index([$name . '_id', $name . '_type'], $name . '_index');
        });

        Blueprint::macro('nullableIndexedUuidMorphs', function (string $name) {
            /**
             * @var Blueprint $this
             */
            $this->uuid($name . '_id');
            $this->string($name . '_type', 100);
            $this->index([$name . '_id', $name . '_type'], $name . '_index');
        });
    }
}
