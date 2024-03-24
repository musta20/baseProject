<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeNotifyTypeRequest;
use App\Models\NotifyType;
use App\Models\TasksNotify;
use Illuminate\Http\Request;

class NotifyTypeController extends Controller
{



    public $rule = [
        "name" => "required|string|max:100|min:3",

    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'name.required' => 'يجب كتابة العنوان ',
            'name.string' => 'يجب ان يكون العنوان نص فقط',
            "name.max" => "يجب ان لا يزيد عنوان النص عن 25 حرف",
            "name.min" => "يجب ان لا يقل عنوان النص عن 3 حرف",



        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NotifyType = NotifyType::latest()->paginate(10);

        return view("admin.Tasks.notify.type.index",  ['NotifyType' => $NotifyType] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.Tasks.notify.type.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeNotifyTypeRequest $request)
    {
                
    //    $data = $request->validate( $this->rule,$this->messages());

    NotifyType::create($request);
   
    return redirect()->route('admin.TasksNotify.index')->with('messages','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotifyType  $notifyType
     * @return \Illuminate\Http\Response
     */
    public function show(NotifyType $NotifyType)
    {

        return view("admin.Tasks.notify.type.edit",  ['NotifyType' => $NotifyType] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotifyType  $notifyType
     * @return \Illuminate\Http\Response
     */
    public function edit(NotifyType $notifyType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotifyType  $notifyType
     * @return \Illuminate\Http\Response
     */
    public function update(storeNotifyTypeRequest $request,NotifyType $NotifyType)
    {

        $NotifyType->name=$request->name;

        $NotifyType->save();

        return redirect()->route('admin.TasksNotify.index')->with('messages','تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotifyType  $
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotifyType $NotifyType)
    {
      $task=  TasksNotify::where('type',$NotifyType->id)->get();

      if(!$task->isEmpty()){
        return redirect()->route('admin.TasksNotify.index')->with('messages','  هذا العنصر مستخدم . لايمكنك حذفه');

      }
        $NotifyType->delete();
        return redirect()->route('admin.TasksNotify.index')->with('messages','تم حذف العنصر');
    }
}
