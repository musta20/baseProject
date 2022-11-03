<?php

namespace App\Mail;

use App\Models\clients;
use App\Models\order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderStatus extends Mailable
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
        
        $ratingCode=false;

        switch ($this->order->status) {
            case 0:
                $img = 'banana.png';
                $status =  ' قيد الانتظار ';
                break;
            case 1:
                $img = 'banana2.png';
                $status =  ' جاري العمل عليه ';
                break;
            case 2:
                $img = 'banana3.png';
                $status =  ' جاهز للتسليم ';
                break;
            case 3:
                $img = 'banana4.png';
                $status = ' تم التسليم';
                $ratingCode =  clients::create([
                    'name' => $this->order->name,
                    'israted' => 0,
                    'status' => 0,
                    'token' => uniqid()
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
        $bill = "";

        if ($this->order->payed) {
            $bill = $this->order->id;
        }

        if ($this->order->status == 0) {
            Mail::to('admin@chessfor.org')->send(new OrderStatus(($this->order)));

        }
        return $this->from('info@chessfor.org', 'admin')
        ->subject('حالة الطلب')
        ->view('mail.OrderStatus')
        ->with([
                'img' => $img,
                'status' => $status,
                'bill' => $bill,
                'ratingCode' => $ratingCode
            ]);
    }
}
