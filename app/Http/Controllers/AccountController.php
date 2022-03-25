<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index')->with([
            'title' => 'Profile',
        ]);
    }

    public function password()
    {
        return view('account.password')->with([
            'title' => 'Profile',
        ]);
    }

    public function profilePicture()
    {
        return view('account.profile-picture')->with([
            'title' => 'Profile',
        ]);
    }
}
