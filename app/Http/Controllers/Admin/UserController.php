<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Coupon;
use Carbon\Carbon;

class UserController extends Controller
{

    public function single(User $user)
    {

        return view('admin.user.single')->with([
            'user' => $user,
            'title' => $user->full_name . ' | Account',
            'transactions' => $user->transactions()->limit(20)->paginate(20),
        ]);
    }

    public function statement(User $user)
    {

        return view('admin.user.statement')->with([
            'user' => $user,
            'title' => $user->full_name . ' | Statment',
        ]);
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.user.index')->with([
            'title' => 'All Marketer',
            'members' => $users,
        ]);
    }
}
