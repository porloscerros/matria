<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->msg = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->msg['email'], env('APP_NAME') . ' Site')
                    ->subject(env('ADMIN_NAME') . '. ' . __('contact-us.you-received'))
                    ->view('emails.contact-us')
                    ->with([
                      'name'     => $this->msg['name'],
                      'email'     => $this->msg['email'],
                      'msg'     => $this->msg['msg']
                    ]);
    }
}
