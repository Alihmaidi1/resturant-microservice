<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class resetmail extends Mailable
{
    use Queueable, SerializesModels;

    public $number;
    public function __construct($number)
    {

        $this->number=$number;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */

    public function build()
    {

        return $this->view('api.resetpassword',["number"=>$this->number]);
    }
}
