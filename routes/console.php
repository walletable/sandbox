<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



Artisan::command('serve:this', function () {

    $this->call('serve', [

        '--port' => '3009'
        
    ]);

})->describe('Serve the project on a custome server.');




Artisan::command('refresh', function () {
    $this->call('db:wipe');

    $this->call('migrate:refresh');

    $this->call('db:seed', [
        '--class' => 'AdminSeeder'
    ]);

    $this->call('db:seed', [
        '--class' => 'UserSeeder'
    ]);
})->describe('Refresh the Migration and seed the inital data.');


Artisan::command('install', function () {
    $this->call('migrate');

    $this->call('db:seed', [
        '--class' => 'InstallSeeder'
    ]);
})->describe('Install The app.');
