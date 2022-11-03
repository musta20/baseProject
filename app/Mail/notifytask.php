<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notifytask extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(notifytask $task)
    {
        $this->task=$task;

    }


    protected $task;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $Title = " تنبيه سجل ";

        $Message = '    لقد قاربة الاقامة رقم على الانتهاء  ' . $this->task->title;


        
        return $this->from('info@chessfor.org', 'admin')
            ->subject($Title)
            ->view('mail.InnerMessages')->with([
                'Title' => $Title,
                'Message' => $Message
            ]);       }
}
