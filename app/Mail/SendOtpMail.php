<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public $text;

    public $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $text, string $code)
    {
        $this->text = $text;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.otp')->with([
            'text' => $this->text,
            'code' => $this->code
        ]);
    }
}
