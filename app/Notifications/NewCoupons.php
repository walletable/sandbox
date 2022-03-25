<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Coupon;

class NewCoupons extends Notification
{
    use Queueable;

    public $coupons;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $coupons )
    {
        $this->coupons = $coupons;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = (new MailMessage)
                    ->subject('Your have received '.$this->coupons->count().' coupon(s)')
                    ->greeting('Dear '. $notifiable->firstname)
                    ->line('Your have received '.$this->coupons->count().' coupon(s)')
                    ->line('List of new Coupons');

                    $this->coupons->each(function ($coupon) use ($message) {
                        $message->line('Coupon Code: '. $coupon->code);
                    });


                    $message->line('Thank you for choosing our user platform!')
                    ->action('Dashboard', route('home'))->priority(1)->success();

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
