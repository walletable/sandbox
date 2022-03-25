<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    /**
     * Error Data
     * @var array|mixed
     */
    public $errors = [];


    public $full_name;

    public $email;

    public $phone;

    public $username;

    public $gender;

    public $date_of_birth;

    public $occupation;

    public $address;

    public $state;

    public $country;

    public $zip;

    public $account_type;

    public $currency;

    public $pin;

    public $password;

    public $password_confirmation;

    public $currencies;

    public function mount()
    {
        $this->fill([
            /* 'full_name' => 'Ilesanmi Olawale',
            'email' => Str::random(4) . 'test@labey-bank.test',
            'phone' => '09045454541',
            'username' => Str::random(12),
            'occupation' => 'Web Developer',
            'address' => 'No 23, Holand resturant',
            'state' => 'Texas',
            'country' => 'United states',
            'zip' => '290899',
            'pin' => '1234',
            'password' => 'whatever',
            'password_confirmation' => 'whatever' */
            'gender' => 'male',
            'date_of_birth' => now(),
            'account_type' => 'savings',
        ]);

        if (
            !is_file(base_path('app/currencies.php')) ||
            !($this->currencies = include base_path('app/currencies.php'))
        ) {
            $this->currencies = [];
        }
    }

    public function render()
    {
        return view('livewire.admin.user.create')
            ->layout('components.admin.layouts.app', [
                'title' => 'Add an Account',
            ]);
    }

    /**
     * Validate Profile inputs
     */
    public function validated()
    {
        $validator = Validator::make($this->data(), [
            'full_name' => 'required|string|min:3|max:75',
            'email' => ['required', 'email', Rule::unique((new User())->getTable())],
            'phone' => 'required|numeric',
            'username' => 'required|string|min:3|max:15',
            'gender' => ['required', Rule::in(['male', 'female'])],
            'date_of_birth' => 'required|date',
            'occupation' => 'required|string|min:3|max:20',
            'address' => 'required|string|min:3|max:100',
            'state' => 'required|string|min:3|max:20',
            'country' => 'required|string|min:3|max:20',
            'zip' => 'required|numeric',
            'currency' => 'required|string|min:3',
            'account_type' => ['required', 'string', Rule::in([
                'savings',
                'checking',
                'brokerage',
                'money_market',
                'cds',
                'retirement'
            ])],
            'pin' => 'required|numeric',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $errors = $validator->errors()->all();

        if ($errors) {
            $this->errors += $errors;
        }
    }

    public function data()
    {
        return $this->only([
            'full_name',
            'email',
            'phone',
            'username',
            'gender',
            'date_of_birth',
            'occupation',
            'address',
            'state',
            'country',
            'zip',
            'account_type',
            'currency',
            'pin',
            'password',
            'password_confirmation'
        ]);
    }

    public function emitErrors()
    {
        $this->emit('errors', $this->errors);
        $this->errors = [];
    }

    public function hasErrors()
    {
        return ($this->errors) ? true : false;
    }

    public function submit()
    {

        $this->validated();

        if ($this->hasErrors()) {
            $this->emitErrors();
            return ;
        }

        $user = User::create($this->only([
            'full_name',
            'email',
            'phone',
            'username',
            'gender',
            'date_of_birth',
            'occupation',
            'address',
            'state',
            'country',
            'zip',
            'currency',
            'account_type',
            'pin',
        ]) + [
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success_title', 'Done!');

        session()->flash('success', $user->full_name . ' as been added as a marketer');

        return redirect()->route('admin.users.single', [
            'user' => $user
        ]);
    }
}
