<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSupport extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    public function __construct($data)
    {
        $this->$data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@chessfor.org', $this->data['fname'] . ' ' . $this->data['lname'])
            ->subject('طلب دعم فني')
            ->view('mail.InnerMessages')->with([
                'Title' => 'طلب تواصل',
                'Message' => $this->data['msg'],
            ]);
    }
}
