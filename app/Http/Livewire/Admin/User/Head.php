<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User;

class Head extends Component
{
    public User $user;

    public $amount;

    public $limitAmount;

    public function render()
    {
        return view('livewire.admin.user.head');
    }


    public function credit()
    {
        $this->user->fill(
            [
                'balance' => (int)$this->user->balance->getAmount() + (int)$this->amount * 100,
            ]
        )->save();

        $this->amount = null;

        $this->emit('success', [
            'title' => 'Done',
            'message' => 'Fund added to account',
        ]);
    }

    public function debit()
    {
        if (
            (int)$this->amount === 0 ||
            (int)$this->user->balance->getAmount() < (int)$this->amount * 100
        ) {
            $this->emit('error', [
                'title' => 'Can\'t work',
                'message' => 'Can`t debit this amount',
            ]);
            return;
        }

        $this->user->fill(
            [
                'balance' =>  (int)$this->user->balance->getAmount() - (int)$this->amount * 100,
            ]
        )->save();

        $this->amount = null;

        $this->emit('success', [
            'title' => 'Done',
            'message' => 'Fund debited from account',
        ]);
    }

    public function increase()
    {
        $this->user->fill(
            [
                'limit_balance' => (int)$this->user->limit_balance->getAmount() + (int)$this->limitAmount * 100,
            ]
        )->save();

        $this->limitAmount = null;

        $this->emit('success', [
            'title' => 'Done',
            'message' => 'Limit Increased',
        ]);
    }

    public function decrease()
    {
        if (
            (int)$this->limitAmount === 0 ||
            (int)$this->user->limit_balance->getAmount() < (int)$this->limitAmount * 100
        ) {
            $this->user->fill(
                [
                    'limit_balance' => 0,
                ]
            )->save();
        } else {
            $this->user->fill(
                [
                    'limit_balance' =>  (int)$this->user->limit_balance->getAmount() - (int)$this->limitAmount * 100,
                ]
            )->save();
        }

        $this->limitAmount = null;

        $this->emit('success', [
            'title' => 'Done',
            'message' => 'Limit Decreased',
        ]);
    }
}
