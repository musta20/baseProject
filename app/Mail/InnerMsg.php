<?php

namespace App\Mail;

use App\Models\message;
use App\Models\order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InnerMsg extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(order $order)
    {
        $this->order = $order;
    }



    protected $order;
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $Title = "طلب جديد";

        $Message = ' : يوجد طلب جديد بعنوان' . $this->order->title;

        message::create([
            "title" =>  $Title,
            "to" => 1,
            "from" => 1,
            "message" =>  $Message,
            "isred" =>  0
        ]);
        
        return $this->from('info@chessfor.org', 'admin')
            ->subject('طلب جديد')
            ->view('mail.InnerMessages')->with([
                'Title' => $Title,
                'Message' => $Message
            ]);
    }
}
