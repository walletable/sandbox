<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\User\Create as UserCreate;

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

Route::namespace('App\Http\Controllers\Admin')->group(function () {
    Auth::routes([
        'register' => false
    ]);
});

Route::get('/', [HomeController::class, 'index'])->name('home');

/* Route::get('/mous/download/{investment}', [MOUController::class, 'download'])
    ->middleware('auth:admin')->name('download'); */

Route::middleware('auth:admin')->prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('create', UserCreate::class)->name('create');
    Route::get('statement/{user}', [UserController::class, 'statement'])->name('statement');
    Route::get('{user}', [UserController::class, 'single'])->name('single');
});
