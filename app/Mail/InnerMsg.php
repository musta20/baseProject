<?php

namespace App\Mail;

use App\Models\Message;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InnerMsg extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }



    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('info@basebroject.testgit.xyz', $this->order->name),
            // replyTo: [
            //     new Address('taylor@example.com', 'Taylor Otwell'),
            // ],
            subject: __('order status'),
        );
    }

 

    public function content(): Content
    {

        $Title = __('new order');

        $Message = ' : يوجد طلب جديد بعنوان' . $this->order->title;

        message::create([
            'title' => $Title,
            'to' => 1,
            'from' => 1,
            'message' => $Message,
            'isred' => 0,
        ]);


        return new Content(
            view: 'mail.InnerMessages',
            with: [
                'Title' =>$Title,
 
                'Message' => $Message,
            ]
        );
    }


}
