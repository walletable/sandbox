<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */



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

    use SendsPasswordResetEmails;
}
