<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\User;

class JumpTo extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.admin.dashboard.jump-to');
    }

    public function jumpTo()
    {
        $user = User::where('email', $this->email)->first();

        if ($user) {
            return redirect()->route('admin.users.single', ['user' => $user->id]);
        } else {
            $this->emit('error', [
                'title' => 'Not found',
                'message' => 'Account with ' . $this->email . ' not found',
            ]);
        }
    }
}
