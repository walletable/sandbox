<?php

namespace App\Http\Livewire\Admin\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    use WithFileUploads;

    /**
     * Error Data
     * @var array|mixed
     */
    public $errors = [];


    public $firstname;

    public $middlename;

    public $surname;

    public $email;

    public $whatsapp;

    public $password;

    public $password_confirmation;


    public function render()
    {
        return view('livewire.admin.admin.create')
            ->layout('components.admin.layouts.app',[
                'title' => 'Add an admin',
            ]);
    }

    /**
     * Validate Profile inputs
     */
    public function validated()
    {

        $data = $this->data();

        $validator = Validator::make( $this->data(), [
            'firstname' => 'required|string|min:3|max:75',
            'middlename' => 'required|string|min:3|max:75',
            'surname' => 'required|string|min:3|max:75',
            'whatsapp' => 'required|string|min:11|max:15',
            'email' => ['required', 'email', Rule::unique((new Admin)->getTable())],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $errors = $validator->errors()->all();

        if ( $errors ) $this->errors += $errors;

    }

    public function data()
    {
        return $this->only(
            [
                'firstname',
                'middlename',
                'surname',
                'email',
                'whatsapp',
                'password',
                'password_confirmation'
            ]
        );

    }




    public function emitErrors()
    {
        $this->emit('errors', $this->errors);
        $this->errors = [];
    }



    public function hasErrors()
    {
        return ( $this->errors )? true : false;
    }


    public function submit()
    {

        $this->validated();
    
    
        if ( $this->hasErrors() ){
            $this->emitErrors();
            return ;
        }

        $admin = Admin::create(
            $this->only(
                [
                    'firstname',
                    'middlename',
                    'email',
                    'whatsapp',
                ]
            )+
            [
                'lastname' => $this->surname,
                'password' => Hash::make($this->password),
            ]
        );
        
        session()->flash('success_title', 'Done!');

        session()->flash('success', fullname($admin).' as been added as an admin');

        return redirect()->route('admin.admins.all');

    }
}

