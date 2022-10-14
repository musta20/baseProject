<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\services;
use Illuminate\Http\Request;

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
        $allorder = order::latest()->get();
    
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
        return view("admin.order.index",  ['AllOrder' => $AllOrder, "title" => $title]);
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
        $order = order::find($id);
        $services = services::find($order->s_id);
        //  dd($order);services

        //$order->price = ;
        $order->price = $order->count * $services->price;
        // $order->push($price);

        $order->ServiceName = $services->name; //still
        $order->still = $order->price - $order->payed;   //still

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



        return view("admin.order.edit",  ['order' =>  $order]);
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
    public function update(Request $request,$id)
    {
       // dd($request->status);
        $data = $request->validate( $this->rule,$this->messages());

        $order  = order::find($id);

        if($request->time)
        {
            $order->time = $request->time;
        }

        if($request->cost){

            $order->payed = $order->payed + $request->cost;
        }

        $order->status = $request->status;

        $order->save();

        return redirect('/admin/showOrderList/'.$order->status);



        
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
