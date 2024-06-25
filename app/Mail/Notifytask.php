<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notifytask extends Mailable
{
    use Queueable, SerializesModels;

    protected $task;

    public function __construct(notifytask $task)
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
