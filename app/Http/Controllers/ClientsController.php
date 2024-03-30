<?php

namespace App\Http\Controllers;

use App\Enums\CommentStatus;
use App\Http\Requests\updateClientRequest;
use App\Models\clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   

 



    public function index()
    {
        $client = clients::latest()->paginate(10);
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
    public function edit(clients $Client)
    {
        $statusoption = CommentStatus::cases();
        return view("admin.client.edit",[ "statusoption" => $statusoption, 'client'=>$Client]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(updateClientRequest $request,clients $Client)
    {
        $Client->status=$request->status;

        $Client->save();

        return redirect()->route('admin.Clients.index')->with('messages','تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(clients $client)
    {
        $client->delete();
        return redirect()->route('admin.Clients.index')->with('messages','تم حذف العنصر');
    }
}
