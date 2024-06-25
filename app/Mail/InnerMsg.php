<?php

namespace App\Mail;

use App\Models\Message;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InnerMsg extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    public function __construct(order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $Title = 'طلب جديد';

        $Message = ' : يوجد طلب جديد بعنوان' . $this->order->title;

        message::create([
            'title' => $Title,
            'to' => 1,
            'from' => 1,
            'message' => $Message,
            'isred' => 0,
        ]);

        return $this->from('info@chessfor.org', 'admin')
            ->subject('طلب جديد')
            ->view('mail.InnerMessages')->with([
                'Title' => $Title,
                'Message' => $Message,
            ]);
    }
}
