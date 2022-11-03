<?php

namespace App\Mail;

use App\Models\message;
use App\Models\Tasks;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TasksMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tasks $task)
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

        $Title = " مهمة جديدة";

        $Message = ' : يوجد  مهمة جديدة بعنوان' . $this->task->title;


        
        return $this->from('info@chessfor.org', 'admin')
            ->subject($Title)
            ->view('mail.InnerMessages')->with([
                'Title' => $Title,
                'Message' => $Message
            ]);   
        
        
        }
}
