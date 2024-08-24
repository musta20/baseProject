<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactSupport extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    public function __construct($data)
    {
        $this->$data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('info@basebroject.testgit.xyz', $this->data['fname'] . ' ' . $this->data['lname']),
            // replyTo: [
            //     new Address('taylor@example.com', 'Taylor Otwell'),
            // ],
            subject: __('support'),
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function content(): Content
    {

        return new Content(
            view: 'mail.InnerMessages',
            with: [
                'Title' => 'طلب تواصل',
                'Message' => $this->data['msg'],
            ]
        );
    }
}
