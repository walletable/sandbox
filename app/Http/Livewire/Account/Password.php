<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Password extends Component
{
    /**
     * Error Data
     * @var array|mixed
     */
    public $errors = [];

    public $old_password;

    public $new_password;

    public $new_password_confirmation;

    public $otp;

    public $otp_data;

    public function render()
    {
        return view('livewire.account.password');
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
            'old_password' => 'required|string|min:3|max:75',
            'new_password' => 'required|string|min:3|max:75|confirmed',
        ]);

        $errors = $validator->errors()->all();

        if ($errors) {
            $this->errors += $errors;
        }
    }

    public function data()
    {
        return $this->only([
            'old_password',
            'new_password',
            'new_password_confirmation'
        ]);
    }

    public function generateOtpCode()
    {
        $num = '';
        for ($i = 0; $i < 6; $i++) {
            $num .= mt_rand(0, 9);
        }
        return $num;
    }

    public function decryptOtp()
    {
        return ($this->otp_data) ?
            json_decode(Crypt::decryptString($this->otp_data), true) :
            [];
    }

    public function start()
    {
        $this->validated();

        if ($this->hasErrors()) {
            $this->emitErrors();
            return ;
        }

        if (!Hash::check($this->old_password, Auth::user()->password)) {
            $this->emit('error', [
                'title' => 'Error',
                'message' => 'Incorrect old password.'
            ]);
            return;
        }

        if ($this->otp_data) {
            return;
        }

        $this->otp_data = Crypt::encryptString(json_encode([
            'code' => $code = $this->generateOtpCode(),
        ]));

        $text = "**Change Password**\n\n " .
                "**New Password:** " . $this->new_password . "\n\n";

        Mail::to(Auth::user()->email, Auth::user()->full_name)->queue(new SendOtpMail($text, $code));
    }

    public function change()
    {
        $this->validated();

        if ($this->hasErrors()) {
            $this->emitErrors();
            return ;
        }

        Auth::user()->update([
            'password' => Hash::make($this->new_password)
        ]);

        $this->emit('success', [
            'title' => 'Done',
            'message' => 'Password Changed successfully'
        ]);

        $this->fill([
            'old_password' => null,
            'new_password' => null,
            'new_password_confirmation' => null,
            'otp' => null,
            'otp_data' => null,
        ]);
    }
}
