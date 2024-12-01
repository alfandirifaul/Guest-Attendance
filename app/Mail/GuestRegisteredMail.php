<?php

namespace App\Mail;

use App\Models\Guest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GuestRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $guest;

    /**
     * Create a new message instance.
     *
     * @param Guest $guest
     */
    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('New Guest Registered')
            ->view('emails.guest-registered')
            ->with('guest', $this->guest);
    }
}
