<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Data\Miners\Admin\AllUserMiner;
use App\Data\Matrixes\Admin\GeneralMatrix;

class MatrixServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $matrix = [
        GeneralMatrix::class => [
            AllUserMiner::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->matrix as $matrix => $miners) {
            foreach ($miners as $miner) {
                $matrix::miner($miner);
            }
        }
    }
}
