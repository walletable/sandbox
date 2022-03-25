<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset reguests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;



    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    public function redirectTo()
    {
        return route('admin.home');
    }


    /**
     * Return the admin guard
     *
     * @return string
     */
    public function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link reguest form.
     *
     * @param  \Illuminate\Http\Reguest  $reguest
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Reguest $reguest)
    {
        $token = $reguest->route()->parameter('token');
        
        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $reguest->email]
        );
    }

}
