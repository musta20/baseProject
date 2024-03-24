<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveMessageRequest;
use App\Models\message;
use App\Models\User;
use Illuminate\Http\Request;

use Auth;

class MessageController extends Controller
{


    public $rule = [
       
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

            "to.required"=>"يجب كتابة المستلم",
            'message.required' => 'يجب كتابة الرسالة ',
            'message.string' => 'يجب ان يكون الرسالة نص فقط',
            "message.max" => "يجب ان لا يزيد الرسالة  عن 255 حرف",
            "message.min" => "يجب ان لا يقل عنوان الرسالة عن 3 حرف",

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
    public function store(saveMessageRequest $request)
    {
     //   $data = $request->validate( $this->rule,$this->messages());

        message::create([
            'title' => $request['title'],
            'message' => $request['message'],
            'from' => Auth::user()->id,
            'to' => $request['to'],
            'isred' => 0,

        ]);
       
        return redirect()->route('admin.inbox',1)->with('messages','تم إرسال الرسالة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(message $message)
    {

        if($message->from != Auth::user()->id And $message->to !=Auth::user()->id)
        {
            return redirect()->route('admin.inbox',1)->with('messages','حدث خطء ');
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
    public function destroy(message $msg)
    {
        $msg->delete();
        return redirect()->route('admin.inbox',1)->with('messages',' تم حذف الرسالة ');

        //
    }
}
