<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->from('example@example.com')
                //->to(config('mail.from.address'))
               // ->subject('HackerPair Inquiry')
                ->view('emails.contact')
                ->attachData("asdfasdfsdaf", 'name.pdf', [
                    'mime'  => 'application/pdf',
                ]);
    }
}
