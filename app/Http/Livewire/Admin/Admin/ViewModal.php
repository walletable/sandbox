<?php

namespace App\Http\Livewire\Admin\Admin;

use Livewire\Component;
use App\Models\Admin;

class ViewModal extends Component
{
    public Admin $admin;

    public function render()
    {
        return view('livewire.admin.admin.view-modal');
    }

    public function unblock()
    {
        if ($this->admin->status->is('active')){
            $this->emit('error', [
                'title' => 'Bad Action',
                'message' => 'This admin is active'
            ]);
        }

        $this->admin->update(
            [
                'status' => 'active',
            ]
        );
        $this->emit('success', [
            'title' => 'Done',
            'message' => 'Admin Unblocked'
        ]);
    }

    public function block()
    {
        if ($this->admin->status->is('blocked')){
            $this->emit('error', [
                'title' => 'Bad Action',
                'message' => 'This admin is already blocked'
            ]);
        }

        $this->admin->update(
            [
                'status' => 'blocked',
            ]
        );

        $this->emit('success', [
            'title' => 'Done',
            'message' => 'Admin Blocked'
        ]);
    }
}
