<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //AllLogs
        $AllLogs = Activity::latest()->paginate(8);
        $users = User::get();

        return view("admin.Logs.index",  ['AllLogs' => $AllLogs,'users'=>$users] );
    }

    public function LogsList($id)
    {
        //AllLogs LogsList

        $AllLogs = Activity::where('causer_id',$id)->paginate(8);
        $users = User::get();
        $name =  User::find($id);
        return view("admin.Logs.list",  ['AllLogs' => $AllLogs,'users'=>$users,'name'=>$name->name] );
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = Activity::find($id);
        return view("admin.Logs.show",  ['log' => $log] );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
