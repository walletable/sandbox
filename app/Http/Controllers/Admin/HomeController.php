<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Boot a new controller instance.
     *
     * @return void
     */
    public function _boot()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$money = User::sum('balance');
        $active_users = User::where('status', 'active')->count('id');
        $hold_users = User::where('status', 'hold')->count('id');
        $total_users = User::count('id');
        $users = User::with('wallets')->paginate(5);

        // $transactions = Transaction::orderBy('created_at', 'desc')->paginate(20);
        // $transactions_count = Transaction::count('id');


        return view('admin.home')->with(
            [
                'title' => 'Dashboard',
                'active_users' => $active_users,
                'hold_users' => $hold_users,
                'total_users' => $total_users,
                'users' => $users,
                // 'transactions' => $transactions,
                // 'transactions_count' => $transactions_count,
            ]
        );
    }

}
