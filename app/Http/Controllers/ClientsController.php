<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   

    public function messages()
    {
        return [
            'status.required' => 'يجب تحديد حالة الطلب ',
            'status.integer' => 'يجب ان تكون الحالة رقم  فقط',
            "status.digits_between" => "  الرقم بين 1-2",

            
        ];
    }



    public function index()
    {
        $client = clients::where('israted',2)->latest()->paginate(10);
        return view("admin.client.index",['client'=>$client]);

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
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $client = clients::find($id);
        return view("admin.client.edit",['client'=>$client]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $data = $request->validate( [ "status" => "required|integer|digits_between:1,2"],$this->messages());
        $clint = clients::find($id);

        $clint->status=$request->status;

        $clint->save();

        return redirect('/admin/Clients/')->with('messages','تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $category = clients::find($id);
        $category->delete();
        return redirect('/admin/Clients/')->with('messages','تم حذف العنصر');
    }
}
