<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\postNotifyTask;
use App\Http\Requests\storeTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Http\Requests\updateTaskRequest;
use App\Models\Files;
use App\Models\NotifySales;
use App\Models\NotifyType;
use App\Models\SalesType;
use App\Models\Tasks;
use App\Models\TasksNotify;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{

    public $ruleNotfy = [

        "duration" => "required|integer|min:1",
        "issueAt" => "required|date",
    ];


    public $ruleisDone = [
        "isDone" => "required|numeric",
    ];

    public $rule = [
        "title" => "required|string|max:100|min:3",
        "des" => "required|string|max:255|min:3",
        "user_id" => "required",
        "start" => "required|date",
        "end" =>   'required|date|after:start'
    ];



    public $ruleUPDATE = [
        "title" => "required|string|max:100|min:3",
        "des" => "required|string|max:255|min:3",
        // "user_id" => "required|string|max:255|min:3",
        "user_id" => "required",
        "isdone" => "required|integer",

        "start" => "required|date",
        "end" =>   'required|date|after:start'
    ];
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'title.required' => 'يجب كتابة العنوان ',
            'title.string' => 'يجب ان يكون العنوان نص فقط',
            "title.max" => "يجب ان لا يزيد عنوان النص عن 25 حرف",
            "title.min" => "يجب ان لا يقل عنوان النص عن 3 حرف",

            'des.required' => 'يجب كتابة الوصف ',
            'des.string' => 'يجب ان يكون الوصف نص فقط',
            "des.max" => "يجب ان لا يزيد الوصف  عن 255 حرف",
            "des.min" => "يجب ان لا يقل عنوان النص عن 3 حرف",


            "duration.required" => "يجب اضافة المدة",
            "issueAt.required" => "يجب اضافة تاريخ الاصدار",
            "issueAt.date" => "يجب ان تكون القيمة تاريخ ",

        


        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $option = TaskStatus::cases();

        $alltask = Tasks::latest()->with('user')->paginate(10);
        return view('admin.Tasks.index', ['alltask' => $alltask,
    'option'=>$option
    ]);
    }

    public function MainTask(Request $request)
    {
        //dd($request->filter);
        $filterBox = Tasks::showFilter();

        $option = TaskStatus::cases();
        $alltask = Tasks::Filter()->where('user_id', Auth::user()->id)->latest()->paginate(10);

        Tasks::where('user_id',Auth::user()->id)->update(['isread' => 1]);

        return view('admin.Tasks.MainTask', [
        'alltask' => $alltask,
        'option'=>$option,
        'filterBox'=>$filterBox]);
    }

    public function ShowTask(Tasks $task)
    {
       // $task = Tasks::find($id);
        //dd($task);
        $files = Files::where('type', 0)->where('typeid', $task->id)->get();
        $option = TaskStatus::cases();

        if ($task->user_id == Auth::user()->id) {
            return view('admin.Tasks.ShowTask', ['task' => $task, "files" => $files,
        
            'option'=>$option 
        ]);
        }

        $option = TaskStatus::cases();

        return redirect()->route('admin.Task.index')->with('messages', 'حدث خطاء');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function EditTask(EditTaskRequest $request,Tasks $task)
    {

        if ($task->user_id == Auth::user()->id) {
            
            if ($request->status != 0 and $request->status != 4) {

                $task->isdone = $request->status;

                $task->save();
            }
        }


        return redirect()->route('admin.admin.MainTask')->with('OkToast', 'تم تعديل البيانات');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::get();
        return view('admin.Tasks.add', ['users' => $users]);
    }

    public function MenuTask()
    {
        //
        return view('admin.Tasks.Menu');
    }

 
 





    //
    public function postMyNotifyTask(postNotifyTask $request,TasksNotify $tasksNotify)
    {

     //  $data = $request->validate($this->ruleNotfy, $this->messages());
       $date = Carbon::createFromFormat('Y-m-d', $request->issueAt);
       $endMonth = $date->addDays(30 * $request->duration)->format('Y-m-d');
       //$tasksNotify = TasksNotify::find($id);

       if(Auth::user()->id != $tasksNotify->user_id)
       {
           return redirect('/admin/showmysale/1');

       }
       $tasksNotify->issueAt = $request->issueAt;
       $tasksNotify->duration = $request->duration;
       $tasksNotify->exp = $endMonth;
       $tasksNotify->save();

       return redirect()->route('admin.showMyNotifyTask' , $tasksNotify->type)->with('messages', 'تم تعديل العنصر');
    }
    

    public function editMyNotifyTask(TasksNotify $task)
    {
        //$task =TasksNotify::find($id);


        if(Auth::user()->id != $task->user_id)
        {
            return redirect('/admin/showmysale/1');

        }

        return view('admin.Tasks.editMyNotifyTask',['task'=>$task ]);
    }

    public function showMyNotifyTask($type)
    {
        $NotifyType=NotifyType::get();
        
        $alltask = TasksNotify::where('type',$type)->where('user_id',Auth::user()->id)->latest()->paginate(10);

        return view('admin.Tasks.showMyNotifyTask',['alltask'=>$alltask,'NotifyType'=>$NotifyType]);




/*         if(Auth::user()->id != $task->user_id)
        {
            return redirect('/admin/showmysale/1');

        } */
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeTaskRequest $request)
    {

       // $data = $request->validate($this->rule, $this->messages());
       //dd($task);

       
        User::findorfail($request['user_id']);
        $task =  Tasks::create([
            "title" => $request['title'],
            "des" => $request['des'],
            "user_id" => $request['user_id'],
            "start" => $request['start'],
            "end" => $request['end'],
            "isdone" => 0,
            "isread" =>0,
            "boss_id" =>  Auth::user()->id,

        ]);
        //$user =  User::find($task->user_id);
        

      //  Mail::to($user->email)->send(new TasksMail(($task)));
/* 
        message::create([
            "title" => "مهمة جديدة",
            "to" => $user->id,
            "from" =>$task->boss_id,
            "message" =>  "لديك مخمة جديدة ",
            "isred" =>  0
        ]); */

        $i = 0;

        while ($request->hasFile('attachment-' . $i)) {
            $filename =  $request->file('attachment-' . $i)->store('task', 'public');
            Files::create([
                "name" => $filename,
                "typeid" => $task->id,
                "type" => 0,
            ]);

            $i = $i + 1;
        }


        return redirect()->route('admin.Task.index')->with('messages', 'تم إضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $Task)
    {
        //task
        // $data = $request->validate( $this->rule,$this->messages());
        /// $data['isdone']=0;
        //  $data['boss_id']=Auth::user()->id;
        $users = User::get();

        $option = TaskStatus::cases();
        return view('admin.Tasks.edit', ["task" => $Task,'option'=>$option, "users" => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(updateTaskRequest $request,Tasks  $task)
    {        
        //$task = Tasks::find($id);

       // $data = $request->validate($this->ruleUPDATE, $this->messages());
   
        $task->title=$request['title'];
        $task->des=$request['des'];
        $task->user_id=$request['user_id'];
        $task->start=$request['start'];
        $task->end=$request['end'];
        $task->isdone=$request['isdone'];
       // $task =  Tasks::create($data);
        //$user =  User::find($task->user_id);
        $task->save();
      //  Mail::to($user->email)->send(new TasksMail(($task)));
      Files::where("typeid", $task->id)->where("type", 0)->delete();

        $i = 0;

        while ($request->hasFile('attachment-' . $i)) {
            $filename =  $request->file('attachment-' . $i)->store('task', 'public');
            Files::create([
                "name" => $filename,
                "typeid" => $task->id,
                "type" => 0,
            ]);

            $i = $i + 1;
        }


        return redirect()->route('admin.Task.index')->with('messages', 'تم إضافة البيانات');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
