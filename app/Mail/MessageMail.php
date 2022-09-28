<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;


    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_data)
    {
        // salvare i dati
        $this->data = $_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.message', [
            "data" => $this->data,
            "user" => $this->data->user
        ])
        ->subject("You have received a new message for your accommodation: " . $this->data->title);
    }
}
