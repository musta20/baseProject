<?php

namespace App\Mail;

use App\Models\Message;
use App\Models\Tasks;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TasksMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $task;

    public function __construct(Tasks $task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $Title = ' مهمة جديدة';

        $Message = ' : يوجد  مهمة جديدة بعنوان' . $this->task->title;

        return $this->from('info@chessfor.org', 'admin')
            ->subject($Title)
            ->view('mail.InnerMessages')->with([
                'Title' => $Title,
                'Message' => $Message,
            ]);

    }
}
