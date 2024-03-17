<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;

use Auth;

class MessageController extends Controller
{


    public $rule = [
        "title" => "required|string|max:100|min:3",
        "to" => "required|integer|digits_between:1,10",
        "message" => "required|string|max:255|min:3",
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

            'message.required' => 'يجب كتابة الرسالة ',
            'message.string' => 'يجب ان يكون الرسالة نص فقط',
            "message.max" => "يجب ان لا يزيد الرسالة  عن 255 حرف",
            "message.min" => "يجب ان لا يقل عنوان الرسالة عن 3 حرف",

            'to.required' => 'يجب كتابة القيمة ',
            'to.integer' => 'يجب ان يكون القيمة  رقم',
            "to.digits_between" => "يجب ان لا يزيد القيمة  عن 10 حرف",



        ];
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
  
    }
    

    public function inbox($type)
    {
        if(!$type){ redirect("/admin/AllMessages"); }

        if($type==1){
            
            $Messages = message::where('from',Auth::user()->id)->with('toUser')->latest()->paginate(10);
      
        }elseif($type==2){

            message::where('to',Auth::user()->id)->update(['isred' => 1]);

            $Messages = message::with('fromUser')->where('to',Auth::user()->id)->latest()->paginate(10);
        }
 
        return view("admin.messages.index")->with('Messages', $Messages)->with('type', $type);
        

    }


    public function main()
    {
        return view("admin.messages.main");

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view("admin.messages.add",['Users'=>$users] );

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
        
        $data['from']=Auth::user()->id;

        $data['isred']=0;
        
        message::create($data);
       
        return redirect('/admin/inbox/1')->with('messages','تم إرسال الرسالة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = message::with('fromUser','toUser')->find($id);

        if($message->from !=Auth::user()->id And $message->to !=Auth::user()->id)
        {
            return redirect('/admin/inbox/1')->with('messages','حدث خطء ');
        }



        return view("admin.messages.show",  ['message' =>$message ] );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg  = message::find($id);
        $msg->delete();
        return redirect('/admin/inbox/1')->with('messages',' تم حذف الرسالة ');

        //
    }
}
