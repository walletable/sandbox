<?php

namespace App\Http\Livewire\Fund;

use App\Lib\File\Avatar\Avatar;
use Livewire\Component;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Walletable\Exceptions\IncompactibleWalletsException;
use Walletable\Exceptions\InsufficientBalanceException;

class Transfer extends Component
{
    /**
     * Error Data
     * @var array|mixed
     */
    public $errors = [];

    public $email;

    public $amount;

    public $pin;

    public $user;

    public $wallet;

    public $remarks;

    public $otp;

    public $otp_data;

    public function render()
    {
        return view('livewire.fund.transfer');
    }

    public function mount()
    {
        $this->fill([
            'user' => Auth::user(),
            'wallet' => Auth::user()->wallets()->first()
        ]);
    }

    public function getReceiverProperty()
    {
        return User::whereEmail($this->email)->first();
    }

    public function getAvatarProperty()
    {
        return is_object($this->receiver) ? $this->receiver->avatar : null;
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
            'email' => 'required|email',
            'amount' => 'required|numeric|min:100',
            'remarks' => 'required|string|max:150',
            'pin' => 'required|digits:4',
        ]);

        $errors = $validator->errors()->all();

        if ($errors) {
            $this->errors += $errors;
        }
    }

    public function data()
    {
        return $this->only([
            'email',
            'amount',
            'remarks',
            'pin',
        ]);
    }

    public function generateOtpCode(int $length = 6)
    {
        $num = '';
        for ($i = 0; $i < $length; $i++) {
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

        if ($this->user->pin !== $this->pin) {
            $this->emit('error', [
                'title' => 'Error',
                'message' => 'Invalid transaction pin.'
            ]);
            return;
        }


        if ($this->otp_data) {
            return;
        }

        $this->otp_data = Crypt::encryptString(json_encode([
            'code' => $code = $this->generateOtpCode(),
        ]));

        $text = "**Fund Transfer**\n\n " .
                "**Name:** " . $this->receiver->name . "\n\n" .
                "**Email:** " . $this->email . "\n\n" .
                "**Amount:** " . $this->amount .  "\n\n";

        Mail::to($this->user->email, $this->user->name)->queue(new SendOtpMail($text, $code));
    }

    public function transfer()
    {
        $this->validated();

        if ($this->hasErrors()) {
            $this->emitErrors();
            return ;
        }

        if (!$this->otp_data || $this->decryptOtp()['code'] !== $this->otp) {
            $this->emit('error', [
                'title' => 'Error',
                'message' => 'Invalid Otp.'
            ]);
            return;
        }

        if ($this->user->pin !== $this->pin) {
            $this->emit('error', [
                'title' => 'Error',
                'message' => 'Invalid transaction pin.'
            ]);
            return;
        }

        $receiver = $this->receiver;
        $Wallet = $this->receiver->wallets()->first();

        try {
            $transfer = $this->wallet->transfer($Wallet, (int)$this->amount * 100, $this->remarks);
        } catch (InsufficientBalanceException $th) {
            $this->emit('error', [
                'title' => 'Error',
                'message' => 'Insufficient balance.'
            ]);
            return;
        } catch (IncompactibleWalletsException $th) {
            $this->emit('error', [
                'title' => 'We are sorry',
                'message' => 'You can not send money to ' . $receiver->name
            ]);
            return;
        } catch (\Throwable $th) {
            throw $th;
        }

        $this->emit('success', [
            'title' => 'Sent',
            'message' => $transfer->getAmount() .
                ' transfered to ' . $receiver->name . ' successfully'
        ]);

        $this->fill([
            'name' => null,
            'amount' => null,
            'pin' => null,
            'otp' => null,
            'otp_data' => null,
        ]);
    }


    /**
     * Return the url of the avater state
     *
     * @param mixed $avatar
     * @return string
     */
    public function url($avatar): string
    {
        $default = new Avatar(json_decode('{
            "name": "default",
            "extension": "jpg",
            "mime": "image/jpg",
            "size": 2453,
            "dimension": {
                "width": 512,
                "height": 512
            },
            "status": "default",
            "sizes": {
                "thumb": {
                    "name": "default_thumb",
                    "extension": "jpg",
                    "mime": "image/jpg",
                    "size": 253,
                    "dimension": {
                        "width": 80,
                        "height": 80
                    }
                },
                "small": {
                    "name": "default_small",
                    "extension": "jpg",
                    "mime": "image/jpg",
                    "size": 953,
                    "dimension": {
                        "width": 256,
                        "height": 256
                    }
                }
            }
        }', true), Auth::user());

        $url = $default->child('small')->url();

        if (!is_null($avatar) && $avatar instanceof Avatar) {
            return $avatar->child('small')->url();
        }

        return $url;
    }
}
