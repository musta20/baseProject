<?php

namespace App\Mail;

use App\Models\Clients;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderStatus extends Mailable
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

    /**
     * Build the message.
     *
     * @return $this
     */
    public function content(): Content
    {

        $ratingCode = false;

        switch ($this->order->status) {
            case 0:
                $img = 'banana.png';
                $status = ' قيد الانتظار ';
                break;
            case 1:
                $img = 'banana2.png';
                $status = ' جاري العمل عليه ';
                break;
            case 2:
                $img = 'banana3.png';
                $status = ' جاهز للتسليم ';
                break;
            case 3:
                $img = 'banana4.png';
                $status = ' تم التسليم';
                $ratingCode = clients::create([
                    'name' => $this->order->name,
                    'israted' => 0,
                    'status' => 0,
                    'token' => uniqid(),
                ]);

                break;
            case 5:
                $img = 'banana.png';
                $status = ' مرفوض ';
                break;
            default:
                $img = 'banana.png';
                $status = 'تحت التنفيذ';
        }
        $bill = '';

        if ($this->order->payed) {
            $bill = $this->order->id;
        }

        if ($this->order->status == 0) {
            Mail::to('admin@chessfor.org')->send(new OrderStatus(($this->order)));

        }

        //   $this->from('info@chessfor.org', 'admin')
        //     ->subject('حالة الطلب')
        //     ->view('mail.OrderStatus')
        //     ->with([
        //         'img' => $img,
        //         'status' => $status,
        //         'bill' => $bill,
        //         'ratingCode' => $ratingCode,
        //     ]);

        return new Content(
            view: 'mail.OrderStatus',
            with: [
                'img' => $img,
                'status' => $status,
                'bill' => $bill,
                'ratingCode' => $ratingCode,
            ]
        );

    }
}
