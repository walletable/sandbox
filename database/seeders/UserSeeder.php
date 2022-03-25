<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Walletable\Facades\Wallet;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::factory()
            ->count(2)
            ->create();

        $users->each(function ($user) {
            Wallet::create($user, Str::uuid(), 'My wallet', 'main', 'NGN');
        });
    }
}
