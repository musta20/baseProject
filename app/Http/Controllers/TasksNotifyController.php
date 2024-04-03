<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeTaskNotifyRequest;
use App\Http\Requests\updateTaskNotifyRequest;
use App\Models\NotifyType;
use App\Models\TasksNotify;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksNotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = NotifyType::latest()->get();

        $users = User::latest()->get();

        return view("admin.Tasks.notify.index", ['tasks' => $tasks, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = NotifyType::get();

        $user = User::get();


        return view('admin.Tasks.notify.add', ['types' => $types, 'users' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeTaskNotifyRequest $request)
    {

       // dd();


      //  $time = strtotime($request->issueAt);
        $date = Carbon::createFromFormat('Y-m-d', $request->issueAt);//->format('Y-m-d');

        //dd( $date);
       // $newformat = date('Y-m-d',$time);
      // $newformat2 = date('d-m-Y',$time);

     //   dd( $newformat );

      //  $startMonth = $newformat->format('Y-m-d');
        // 31-5-2022
        $endMonth = $date->addDays(30 * $request->duration)->format('Y-m-d');


        $tasksNotify =   TasksNotify::create([
            'name' => $request->name,
            'number' => $request->number,
            'issueAt' => $request->issueAt,
            'user_id' => $request->user_id,
            'from' => Auth::user()->id,
            'duration' => $request->duration,
            'exp' => $endMonth,
            'type' => $request->type,
        ]);


        return redirect()->route('admin.TasksNotify.show' , $tasksNotify->type)->with('OkToast', 'تم اضافة العنصر');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TasksNotify  $tasksNotify
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task  = TasksNotify:://where('from', Auth::user()->id)
          //  ->orWhere('user_id', Auth::user()->id)
            //->
            where('type', $id)
            ->latest()
            ->paginate(10);

        return view('admin.Tasks.notify.show', ["alltask" => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TasksNotify  $tasksNotify
     * @return \Illuminate\Http\Response
     */
    public function edit(TasksNotify $tasksNotify)
    {

        return view('admin.Tasks.notify.edit', ["tasksNotify" => $tasksNotify]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TasksNotify  $tasksNotify
     * @return \Illuminate\Http\Response
     */
    public function update(updateTaskNotifyRequest $request,TasksNotify $tasksNotify)
    {
       // $tasksNotify  = TasksNotify::find($id);

        $tasksNotify->name  =  $request->name;
        $tasksNotify->number  =  $request->number;
        $tasksNotify->issueAt  =  $request->issueAt;
        $tasksNotify->duration  =  $request->duration;

        $tasksNotify->save();

        return redirect()->route('admin.TasksNotify' , $tasksNotify->type)->with('OkToast', 'تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TasksNotify  $tasksNotify
     * @return \Illuminate\Http\Response
     */
    public function destroy(TasksNotify $tasksNotify)
    {
       // $tasksNotify = TasksNotify::find($id);
          //  ->where('from', Auth::user()->id);

        $theType =  $tasksNotify->type;

        $tasksNotify->delete();

        return redirect()->route('admin.TasksNotify' , $theType)->with('OkToast', 'تم حذف العنصر');
    }
}
