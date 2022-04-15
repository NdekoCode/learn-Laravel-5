<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class newFollowerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Les vues vont recuperer toutes les variables public et les rendre utilisable
     *
     * @var App\User
     */
    public $follower;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($follower)
    {
        $this->follower = $follower;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Vous avez un nouveau follower')
        ->view('mails.new_follower');
    }
}
