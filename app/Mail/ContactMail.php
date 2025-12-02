<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $pesan;

    public function __construct($name, $email, $pesan)
    {
        $this->name = $name;
        $this->email = $email;
        $this->pesan = $pesan;
    }

    public function build()
    {
        return $this->subject('Pesan Baru dari Contact Form')
                    ->view('emails.contact');
    }
}
