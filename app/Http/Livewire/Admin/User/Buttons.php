<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;

class Buttons extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.admin.user.buttons');
    }

    public function clearTransactions()
    {
        $this->user->transactions()->delete();

        \session()->flash('success_title', 'Done!');

        \session()->flash('success', 'All transactions deleted');

        return \redirect()->route('admin.users.single', [
            'user' => $this->user
        ]);
    }

    public function status(string $status)
    {
        $this->user->update([
            'status' => $status,
        ]);

        $this->emit('success', [
            'title' => 'Done',
            'message' => 'Account status changed.'
        ]);
    }
}
