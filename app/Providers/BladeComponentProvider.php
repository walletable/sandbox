<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeComponentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerLayoutComponent();
    }


    public function registerLayoutComponent()
    {/* 
        Blade::component('layouts.auth', 'layouts-auth');

        Blade::component('components.aside', 'components-aside'); */
    }
}
