<?php

namespace App\Http\Controllers;

use App\Models\NotifySales;
use App\Models\SalesType;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class NotifySalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=SalesType::latest()->get();

        return view("admin.Tasks.notifySale.index",['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types= SalesType::get();
        $users=User::get();
        return view('admin.Tasks.notifySale.add',['types'=>$types,'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tasksNotify =   NotifySales::create([
            'name'=>$request->name,
            'count'=>$request->count,
            'from'=>Auth::user()->id,
            'user_id'=>$request->user_id,
            'isDone'=>0,
            'type'=>$request->type,
     ]);


        return redirect('/admin/NotifySales/'.$tasksNotify->type)->with('messages', 'تم اضافة العنصر');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotifySales  $notifySales
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task  = NotifySales::where('type',$id)->latest()->paginate(10);

        return view('admin.Tasks.notifySale.show',["alltask"=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotifySales  $notifySales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasksNotify  = NotifySales::find($id);
       

        $type = SalesType::get();

        return view('admin.Tasks.notifySale.edit',["tasksNotify"=>$tasksNotify,'types'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotifySales  $notifySales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $tasksNotify  = NotifySales::find($id);

  

        $tasksNotify->name  =  $request->name;
        $tasksNotify->count  =  $request->count;
        $tasksNotify->isDone  =  $request->isDone;

        $tasksNotify->save();

        return redirect('/admin/NotifySales/'.$tasksNotify->type)->with('messages', 'تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotifySales  $notifySales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasksNotify = NotifySales::find($id);

        $theType =  $tasksNotify->type;

        $tasksNotify->delete();

        return redirect('/admin/NotifySales/'.$theType)->with('messages', 'تم حذف العنصر');
    }
}
