<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeDeliveryRequest;
use App\Http\Requests\updateDeliveryRequest;
use App\Models\delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


  
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */


    public function index()
    {
        $delivery = delivery::latest()->paginate(10);

        return view("admin.order.delivery.index",  ['delivery' => $delivery] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.order.delivery.add" );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeDeliveryRequest $request)
    {

        delivery::create($request);
       
        return redirect()->route('admin.Delivery.index')->with('messages','تم إضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(delivery $delivery)
    {
        return view("admin.order.delivery.edit",  ['delivery' => $delivery] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(updateDeliveryRequest $request,delivery $delivery)
    {

        $delivery->name=$request->name;

        $delivery->save();

        return redirect()->route('admin.Delivery.index')->with('messages','تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('admin.Delivery.index')->with('messages','تم حذف العنصر');
    }
}
