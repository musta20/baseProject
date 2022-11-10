<?php

namespace App\Http\Controllers;

use App\Mail\TasksMail;
use App\Models\Files;
use App\Models\message;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TasksController extends Controller
{


    public $rule = [
        "title" => "required|string|max:100|min:3",
        "des" => "required|string|max:255|min:3",
        // "user_id" => "required|string|max:255|min:3",
        "user_id" => "required|integer",

        "start" => "required|date",
        "end" =>   'required|date|after:start'
    ];



    public $ruleUPDATE = [
        "title" => "required|string|max:100|min:3",
        "des" => "required|string|max:255|min:3",
        // "user_id" => "required|string|max:255|min:3",
        "user_id" => "required|integer",
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


        ];
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alltask = Tasks::latest()->with('user')->paginate(10);
        return view('admin.Tasks.index', ['alltask' => $alltask]);
    }

    public function MainTask()
    {
        $alltask = Tasks::where('user_id', Auth::user()->id)->latest()->paginate(10);

        Tasks::where('user_id',Auth::user()->id)->update(['isread' => 1]);

        return view('admin.Tasks.MainTask', ['alltask' => $alltask]);
    }

    public function ShowTask($id)
    {
        $task = Tasks::find($id);

        $files = Files::where('type', 0)->where('typeid', $task->id)->get();

        //  files

        if ($task->user_id == Auth::user()->id) {
            return view('admin.Tasks.ShowTask', ['task' => $task, "files" => $files]);
        }

        return redirect('/admin/Task')->with('messages', 'حدث خطاء');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function EditTask(Request $request, $id)
    {
        $task = Tasks::find($id);

        if ($task->user_id == Auth::user()->id) {
            
            if ($request->status != 0 and $request->status != 4) {

                $task->isdone = $request->status;

                $task->save();
            }
        }


        return redirect('/admin/MainTask')->with('messages', 'تم تعديل البيانات');
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

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $data = $request->validate($this->rule, $this->messages());
        $data['isdone'] = 0;
        $data['isread'] = 0;
        $data['boss_id'] = Auth::user()->id;

        $task =  Tasks::create($data);
        $user =  User::find($task->user_id);

      //  Mail::to($user->email)->send(new TasksMail(($task)));

        message::create([
            "title" => "مهمة جديدة",
            "to" => $user->id,
            "from" =>$task->boss_id,
            "message" =>  "لديك مخمة جديدة ",
            "isred" =>  0
        ]);

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


        return redirect('/admin/Task')->with('messages', 'تم إضافة البيانات');
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
    public function edit($id)
    {
        //task

        // $data = $request->validate( $this->rule,$this->messages());
        /// $data['isdone']=0;
        //  $data['boss_id']=Auth::user()->id;
        $users = User::get();

        $task = Tasks::with('user')->find($id);

        return view('admin.Tasks.edit', ["task" => $task, "users" => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {        $task = Tasks::find($id);

  
        $data = $request->validate($this->ruleUPDATE, $this->messages());
   
        $task->title=$data['title'];
        $task->des=$data['des'];
        $task->user_id=$data['user_id'];
        $task->start=$data['start'];
        $task->end=$data['end'];
        $task->isdone=$data['isdone'];
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


        return redirect('/admin/Task')->with('messages', 'تم إضافة البيانات');
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
