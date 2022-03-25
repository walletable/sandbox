<?php

namespace App\Http\Livewire\Admin\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\User;

class AddTransaction extends Component
{
    /**
     * Error Data
     * @var array|mixed
     */
    public $errors = [];

    public User $user;

    public $amount;

    public $title;

    public $naration;

    public $bank_name;

    public $created_at;

    public $commit = true;

    public $balance;

    public $action = 'credit';

    public function render()
    {
        return view('livewire.admin.user.add-transaction');
    }

    public function emitErrors()
    {
        $this->emit('errors', $this->errors);
        $this->errors = [];
    }

    public function hasErrors()
    {
        return ( $this->errors ) ? true : false;
    }

    /**
     * Validate Profile inputs
     */
    public function validated()
    {
        $validator = Validator::make($this->data(), [
            'title' => 'required|string|min:3|max:75',
            'naration' => 'nullable|string|min:3|max:75',
            'action' => ['required', Rule::in(['debit', 'credit'])],
            'amount' => 'required|numeric',
            'bank_name' => 'required|string|min:3|max:75'
        ]);

        $errors = $validator->errors()->all();

        if ($errors) {
            $this->errors += $errors;
        }
    }

    public function data()
    {
        return $this->only([
            'title',
            'naration',
            'action',
            'bank_name',
            'amount',
        ]);
    }

    public function create()
    {
        $this->validated();

        if ($this->hasErrors()) {
            $this->emitErrors();
            return ;
        }

        if ($this->action === 'debit') {
            $balance = (int)$this->user->balance->getAmount() - (int)$this->amount * 100;
        } else {
            $balance = (int)$this->user->balance->getAmount() + (int)$this->amount * 100;
        }

        if ((int)$this->user->balance->getAmount() < (int)$this->amount * 100) {
            $balance = 0;
        }

        DB::transaction(function () use ($balance) {
            $this->user->fill([
                'balance' => $balance
            ])->save();

            $this->user->transactions()->create($this->only([
                'title',
                'naration',
                'bank_name',
                'action'
            ]) + [
                'currency' => $this->user->currency,
                'amount' => (int)$this->amount * 100,
                'created_at' => ($this->created_at) ? $this->created_at : now(),
                'balance' => $balance
            ]);
        });

        return \redirect()->route('admin.users.single', [
            'user' => $this->user
        ]);
    }
}
