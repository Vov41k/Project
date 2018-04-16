<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $title, $description_short, $description, $image, $email, $userName)
    {
        $this->subject           = $subject;
        $this->title             = $title;
        $this->description_short = $description_short;
        $this->description       = $description;
        $this->image             = $image;
        $this->email             = $email;
        $this->userName          = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.email.index')->with([
            'subject'           => $this->subject,
            'title'             => $this->title,
            'description_short' => $this->description_short,
            'description'       => $this->description,
            'image'             => $this->image,

        ])->to($this->email)->from('britishalsi@gmail.com', "Shops");
    }
}
