<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Notifytask extends Mailable
{
    use Queueable, SerializesModels;

    protected $task;

    public function __construct(Notifytask $task)
    {
        $this->task = $task;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), $this->task->title),
            // replyTo: [
            //     new Address('taylor@example.com', 'Taylor Otwell'),
            // ],
            subject: __('order status'),
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $Title = ' تنبيه سجل ';

        $Message = '    لقد قاربة الاقامة رقم على الانتهاء  ' . $this->task->title;

        return $this->from('info@chessfor.org', 'admin')
            ->subject($Title)
            ->view('mail.InnerMessages')->with([
                'Title' => $Title,
                'Message' => $Message,
            ]);
    }
}
