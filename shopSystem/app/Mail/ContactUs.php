<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $bodymessage)
    {
        $this->name        = $name;
        $this->email       = $email;
        $this->subject     = $subject;
        $this->bodymessage = $bodymessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('email.index')->with([
            'name'        => $this->name,
            'email'       => $this->email,
            'subject'     => $this->subject,
            'bodymessage' => $this->bodymessage,

        ])->to('britishalsi@gmail.com')->from($this->email, $this->name)->subject($this->subject);
    }
}
