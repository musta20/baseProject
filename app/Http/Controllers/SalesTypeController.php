<?php

namespace App\Http\Controllers;

use App\Models\NotifySales;
use App\Models\SalesType;
use Illuminate\Http\Request;

class SalesTypeController extends Controller
{


    public $rule = [
        "name" => "required|string|max:100|min:3",
        "price" => "required|string|max:100|min:3",

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
        $NotifyType = SalesType::latest()->paginate(10);

        return view("admin.Tasks.notifySale.type.index",  ['NotifyType' => $NotifyType] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.Tasks.notifySale.type.add");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                        
    $data = $request->validate( $this->rule,$this->messages());

    SalesType::create($data);
   
    return redirect('/admin/NotifySales')->with('messages','تم إضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesType  $salesType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $NotifyType = SalesType::find($id);
        return view("admin.Tasks.notifySale.type.edit",  ['NotifyType' => $NotifyType] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesType  $salesType
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesType $salesType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalesType  $salesType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data = $request->validate( $this->rule,$this->messages());
        $NotifyType = SalesType::find($id);

        $NotifyType->name=$request->name;
        $NotifyType->price=$request->price;


        $NotifyType->save();

        return redirect('/admin/NotifySales/')->with('messages','تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesType  $salesType
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $NotifyType = SalesType::find($id);
        $task=  NotifySales::where('type',$NotifyType->id)->get();
  
        if(!$task->isEmpty()){
          return redirect('/admin/NotifySales/')->with('messages','  هذا العنصر مستخدم . لايمكنك حذفه');
  
        }
          $NotifyType->delete();
          return redirect('/admin/NotifySales/')->with('messages','تم حذف العنصر');    }
}
