<?php

namespace App\Mail;

use App\Fan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ValidateFan extends Mailable
{
    use Queueable, SerializesModels;

    public $fan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Fan $fan)
    {
        $this->fan = $fan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Bem Vindo!')
            ->view('emails.fans.validate')
            ->with([
                'name'  => $this->fan->name,
                'id'    => $this->fan->id,
                'token' => $this->fan->user->remember_token,
            ]);
    }
}