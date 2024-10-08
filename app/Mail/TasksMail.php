<?php

namespace App\Mail;

use App\Models\Tasks;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TasksMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $task;

    public function __construct(Tasks $task)
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
            subject: __('new task'),
        );
    }

    public function content(): Content
    {
        $Title = ' مهمة جديدة';

        $Message = ' : يوجد  مهمة جديدة بعنوان' . $this->task->title;

        return new Content(
            view: 'mail.InnerMessages',
            with: [
                'Title' => $Title,
                'Message' => $Message,
            ]
        );
    }
}
