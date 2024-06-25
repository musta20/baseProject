<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePaymentRequest;
use App\Http\Requests\updatePaymentRequest;
use App\Models\Payment as payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = payment::latest()->paginate(10);

        return view('admin.order.payment.index', ['payment' => $payment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.payment.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePaymentRequest $request)
    {

        payment::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.Payment.index')->with('OkToast', 'تم إضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $Payment)
    {
        return view('admin.order.payment.edit', ['payment' => $Payment]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(updatePaymentRequest $request, payment $Payment)
    {
        // $data = $request->validate( $this->rule,$this->messages());

        //$payment = payment::find($id);

        $Payment->name = $request->name;

        $Payment->save();

        return redirect()->route('admin.Payment.index')->with('OkToast', 'تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $Payment)
    {
        //  $payment = payment::find($id);
        $Payment->delete();

        return redirect()->route('admin.Payment.index')->with('OkToast', 'تم حذف العنصر');
    }
}
