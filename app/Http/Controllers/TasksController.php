<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\EditTaskRequest;
use App\Http\Requests\postNotifyTask;
use App\Http\Requests\storeTaskRequest;
use App\Http\Requests\updateTaskRequest;
use App\Models\Files;
use App\Models\NotifyType;
use App\Models\Tasks;
use App\Models\TasksNotify;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $option = TaskStatus::cases();

        $users = User::all();

        $filterBox = Tasks::showFilter(
            realData: $users,
            relType: 'user',
            relName: 'المستخدمين',
        );

        $alltask = Tasks::Filter()->latest()->with('user')->RequestPaginate();

        return view('admin.Tasks.index', ['alltask' => $alltask,
            'filterBox' => $filterBox,
            'option' => $option,
        ]);
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
        $task = Tasks::create([
            'title' => $request['title'],
            'des' => $request['des'],
            'user_id' => $request['user_id'],
            'start' => $request['start'],
            'end' => $request['end'],
            'isdone' => 0,
            'isread' => 0,
            'boss_id' => Auth::user()->id,

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

            $filenameName = time() . rand(1, 10000) . '-' . $request->file('attachment-' . $i)->getClientOriginalName();

            $request->validate([
                'attachment-' . $i => 'required|file|mimes:doc,pdf,jpg,jpeg,png|max:2048',
            ]);

            $request->file('attachment-' . $i)->storeAs('task', $filenameName);
            Files::create([
                'name' => $filenameName,
                'typeid' => $task->id,
                'type' => 0,
            ]);

            $i = $i + 1;
        }

        return redirect()->route('admin.Task.index')->with('OkToast', 'تم إضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
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
        $files = Files::where('type', 0)->where('typeid', $Task->id)->get();
        $option = TaskStatus::cases();

        return view('admin.Tasks.edit', ['task' => $Task, 'files' => $files, 'option' => $option, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(updateTaskRequest $request, Tasks $Task)
    {

        $Task->title = $request['title'];
        $Task->des = $request['des'];
        $Task->user_id = $request['user_id'];
        $Task->start = $request['start'];
        $Task->end = $request['end'];
        $Task->isdone = $request['isdone'];

        $Task->save();

        Files::where('typeid', $Task->id)->where('type', 0)->delete();

        $i = 0;

        while ($request->hasFile('attachment-' . $i)) {

            $filenameName = $request->file('attachment-' . $i)->getClientOriginalName();

            $request->file('attachment-' . $i)->store('task');
            Files::create([
                'name' => $filenameName,
                'typeid' => $Task->id,
                'type' => 0,
            ]);

            $i = $i + 1;
        }

        return redirect()->route('admin.Task.index')->with('OkToast', 'تم تعديل البيانات');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $Task)
    {
        $Task->delete();

        return redirect()->route('admin.Task.index')->with('OkToast', 'تم حذف البيانات');
    }

    public function MainTask(Request $request)
    {
        $filterBox = Tasks::showFilter();

        $option = TaskStatus::cases();

        $alltask = Tasks::Filter()->where('user_id', Auth::user()->id)->latest()->paginate(10);

        Tasks::where('user_id', Auth::user()->id)->update(['isread' => 1]);

        return view('admin.Tasks.MainTask', [
            'alltask' => $alltask,
            'option' => $option,
            'filterBox' => $filterBox]);
    }

    public function ShowTask(Tasks $task)
    {

        if ($task->user_id == Auth::user()->id) {
            $files = Files::where('type', 0)->where('typeid', $task->id)->get();
            $option = TaskStatus::cases();

            return view('admin.Tasks.ShowTask', ['task' => $task, 'files' => $files,
                'option' => $option,
            ]);
        }

        return redirect()->route('admin.Task.index')->with('OkToast', 'حدث خطاء');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditTask(EditTaskRequest $request, Tasks $task)
    {

        if ($task->user_id == Auth::user()->id) {

            if ($request->status != 0 and $request->status != 4) {

                $task->isdone = $request->status;

                $task->save();
            }
        }

        return redirect()->route('admin.admin.MainTask')->with('OkToast', 'تم تعديل البيانات');
    }

    public function MenuTask()
    {
        //
        return view('admin.Tasks.Menu');
    }

    //
    public function postMyNotifyTask(postNotifyTask $request, TasksNotify $tasksNotify)
    {

        $date = Carbon::createFromFormat('Y-m-d', $request->issueAt);
        $endMonth = $date->addDays(30 * $request->duration)->format('Y-m-d');

        if (Auth::user()->id != $tasksNotify->user_id) {
            return redirect('/admin/showmysale/1');

        }
        $tasksNotify->issueAt = $request->issueAt;
        $tasksNotify->duration = $request->duration;
        $tasksNotify->exp = $endMonth;
        $tasksNotify->save();

        return redirect()->route('admin.showMyNotifyTask', $tasksNotify->type)->with('OkToast', 'تم تعديل العنصر');
    }

    public function editMyNotifyTask(TasksNotify $task)
    {
        //$task =TasksNotify::find($id);

        if (Auth::user()->id != $task->user_id) {
            return redirect('/admin/showmysale/1');

        }

        return view('admin.Tasks.editMyNotifyTask', ['task' => $task]);
    }

    public function showMyNotifyTask($type)
    {
        $NotifyType = NotifyType::get();

        $alltask = TasksNotify::where('type', $type)->where('user_id', Auth::user()->id)->latest()->paginate(10);

        return view('admin.Tasks.showMyNotifyTask', ['alltask' => $alltask, 'NotifyType' => $NotifyType]);

        /*         if(Auth::user()->id != $task->user_id)
                {
                    return redirect('/admin/showmysale/1');

                } */
    }
}
