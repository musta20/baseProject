<?php

namespace App\Http\Controllers;

use App\Mail\OrderStatus;
use App\Models\delivery;
use App\Models\Files;
use App\Models\job_city;
use App\Models\order;
use App\Models\payment;
use App\Models\services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public $rule = [
        "time" => "nullable|date",
        //"cost" => "integer|digits_between:1,10",
        "status" => "required|integer|max:4|min:1"
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'status.required' => 'يجب اختيار حالة الطلب ',
            'status.min' => 'يجب اختيار حالة الطلب ',
            'status.integer' => 'يجب ان يكون العنوان نص فقط',
        ];
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allorder = order::latest()->paginate(10);

        return view("admin.order.main",  ['allorder' => $allorder]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrderList($type)
    {
        $AllOrder = order::where('status', $type)->paginate(10);
        switch ($type) {
            case 0:
                $title = "الطلبات الجديدة";
                break;
            case 1:
                $title = "الطلبات المكتملة";
                break;
            case 2:
                $title = "الطلبات المسلتلمة";
                break;
            case 3:
                $title = "الطلبات الملغية";
                break;
            default:
                break;
        }
        return view("admin.order.index",  ['AllOrder' => $AllOrder,'type'=>$type, "title" => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function seedAllOrderList()
    {
        $payment_way = array("فاتورة", "تحويل بنكي", "عند التسليم", "كاش ");
        $delevryway = array("استلام من الفرع", "ارسال للايميل", "ارسال للواتساب", "توصيل ");


        foreach ($delevryway as $value) {
            $item = delivery::where('name', $value)->first();;
            if (!$item) {
                delivery::create(["name" => $value]);
            }
        }

        foreach ($payment_way as $value) {
            $item = payment::where('name', $value)->first();;
            if (!$item) {
                payment::create(["name" => $value]);
            }
        }


        $cars = array(
            " الخرج | Al-Kharag",
            "الدوادمي | Al-Dawadmi",
            "الجبيل | Jubail",
            "الاحساء | Al-Ahsa",
            "الخبر | Khobar",
            "المجمعة | Al-Majmaah",
            "تبوك | Tabuk",
            "الجوف | Al-jouf ",
            "الظهران| Dhahran",
            "جازان | Jizan",
            "نجران | Najran",
            "ابها | Abha",
            "عسير | Asser",
            "الباحة | Al-Baha",
            "الطائف | Taif",
            "ينبع | Yanbu",
            "مكة المكرمة  | Makkah",
            "المدينة المنورة | Medina",
            "حفر الباطن | Hafar Al-batin",
            "الدمام | Dammam",
            "حائل | Hail",
            "القصيم | Qassim",
            "الرياض | Riyadh"
        );

        foreach ($cars as $value) {
            $item = job_city::where('name', $value)->first();;
            if (!$item) {
                job_city::create(["name" => $value]);
            }
        }

        return "job city seeded";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = order::with('servicesNmae')->with('dev')->with('pym')->find($id);

        //$order = order::find($id)->with('dev');//->with('pym');
        //with('servicesNmae')
     //   dd($order->name);
    //    $services = services::find($order->s_id);
  
        $order->price = $order->count * $order->servicesNmae->price;
        
        $order->ServiceName = $order->servicesNmae->name; //still

        $order->still = $order->price - $order->payed;   //still

        $files = Files::where('type', 1)->where('typeid', $order->id)->get();

  
        switch ($order->status) {
            case 0:
                $order->status_order = "قيد الانتظار";
                break;
            case 1:
                $order->status_order = "جاري العمل عليه";
                break;
            case 2:
                $order->status_order = "جاهز للتسليم";
                break;
            case 3:
                $order->status_order = " تم تسليمه";
                break;
            case 4:
                $order->status_order = " ملغي";
                break;
            default:
                # code...
                break;
        }



        return view("admin.order.edit",  ['order' =>  $order ,"files"=>$files]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate($this->rule, $this->messages());

        $order  = order::find($id);

        if ($request->time) {
            $order->time = $request->time;
        }

        if ($request->cost) {
            $order->payed = $order->payed + $request->cost;
        }

        $send=false;

        if($order->status != $request->status)
        {
            $send=true;
        }

        $order->status = $request->status;

        if ($request->status == 1) {
            $order->approve_time = date('d-m-y h:i:s');
        }
     
        $order->save();

        if($send){
        Mail::to($order->email)->send(new OrderStatus(($order)));
        }

        return redirect('/admin/showOrderList/' . $order->status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
