<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function edit()
    {
        return view('admin.account.edit')->with('title', 'Edit Account');
    }
}
