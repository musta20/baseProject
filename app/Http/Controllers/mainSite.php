<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveJobRequest;
use App\Http\Requests\saveOrderRequest;
use App\Http\Requests\sendContactRequest;
use App\Models\category;
use App\Models\clients;
use App\Models\CustmerSlide;
use App\Models\dev_to_serv;
use App\Models\Files;
use App\Models\job_app;
use App\Models\job_city;
use App\Models\jobs;
use App\Models\message;
use App\Models\numbers;
use App\Models\order;
use App\Models\pym_to_serv;
use App\Models\RequiredFiles;
use App\Models\services;
use App\Models\setting;
use App\Models\slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class mainSite extends Controller
{
    public $ContactRule = [

        "phone" => "required|numeric|digits_between:10,10",
        "email" => "required|email|max:100|min:3",
        "fname" => "required|string|max:100|min:3",
        "lname" => "required|string|max:100|min:3",
        "msg" => "required|string|max:255|min:3",
    ];

    public function ContactmMssages()
    {
        return [

            'phone.required' => 'يجب اضافة  رقم الجوال ',
            'phone.integer' => 'الجوال رقم فقط',
            "phone.digits_between" => "رقم الجوال يجب ان لايزيد عن 10 ارقام ",

            'msg.required' => 'يجب اضافة الرسالة ',
            'msg.string' => 'يجب ان يكون الرسالة نص فقط',
            "msg.max" => "يجب ان لا يزيد الرسالة  عن 25 حرف",
            "msg.min" => "يجب ان لا يقل الرسالة عن 3 حرف",

            'fname.required' => 'يجب اضافة  الاسم ',
            'fname.string' => 'يجب ان يكون الاسم نص فقط',
            "fname.max" => "يجب ان لا الاسم  عن 25 حرف",
            "fname.min" => "يجب ان لا يقل الاسم عن 3 حرف",

            'lname.required' => 'يجب اضافة  الاسم ',
            'lname.string' => 'يجب ان يكون الاسم نص فقط',
            "lname.max" => "يجب ان لا الاسم  عن 25 حرف",
            "lname.min" => "يجب ان لا يقل الاسم عن 3 حرف",



            'email.required' => '  البريد الالكتروني مطلوب ',
            'email.email' => 'قيمة المدخلة ليسة بريد الكتروني',
            "email.max" => "يجب ان لا يزيدبريد الكتروني   عن 25 حرف",
            "email.min" => "يجب ان لا يقل بريد الكتروني عن 3 حرف",


        ];
    }

    

    public $Jobrule = [

        "phone" => "required|numeric|digits_between:10,10",
        "email" => "required|email|max:100|min:3",
        "name" => "required|string|max:100|min:3",

        "cert" => "required|string|max:100|min:3",
        "exp" => "required|numeric",
        "exp_des" => "required|string|max:100|min:3",

        "city" => "required|string|max:100|min:3",
        "job_city" => "required|string|max:100|min:1",

        "majer" => "required|string|max:100|min:3",

        "job_id" => "required",
        "about" => "required|string|max:100|min:3",
        'cv' => 'required|max:2048|mimes:pdf',

    ];

    public function JobMessages()
    {
        return [

            'phone.required' => 'يجب اضافة  رقم الجوال ',
            'phone.numeric' => 'الجوال رقم فقط',
            "phone.digits_between" => "رقم الجوال يجب ان لايزيد عن 10 ارقام ",

            'exp_des.required' => 'يجب اضافة  تفاصيل الخيرة ',
            'exp_des.string' => 'يجب ان يكون  تفاصيل الخيرة',
            "exp_des.max" => "يجب ان لا يزيد تفاصيل الخيرة  عن 255 حرف",
            "exp_des.min" => "يجب ان لا يقل تفاصيل الخيرة عن 3 حرف",

            'exp.required' => 'يجب اضافة  عدد سنوات ',
            'exp.numeric' => 'يجب ان يكون عدد سنوات  رقم',

            'name.required' => 'يجب اضافة  الاسم ',
            'name.string' => 'يجب ان يكون الاسم نص فقط',
            "name.max" => "يجب ان لا الاسم  عن 25 حرف",
            "name.min" => "يجب ان لا يقل الاسم عن 3 حرف",

            'email.required' => '  البريد الالكتروني مطلوب ',
            'email.email' => 'قيمة المدخلة ليسة بريد الكتروني',
            "email.max" => "يجب ان لا يزيدبريد الكتروني   عن 25 حرف",
            "email.min" => "يجب ان لا يقل بريد الكتروني عن 3 حرف",

            'city.required' => 'يجب اضافة المدينة الاقامة  ',
            'city.string' => 'يجب ان يكون المدينة نص فقط',
            "city.max" => "يجب ان لا يزيد المدينة  عن 25 حرف",
            "city.min" => "يجب ان لا يقل المدينة عن 3 حرف",

            'majer.required' => 'يجب اضافة التحصص الدراسي  ',
            'majer.string' => 'يجب ان يكون التحصص الدراسي نص فقط',
            "majer.max" => "يجب ان لا يزيد التحصص  عن 25 حرف",
            "majer.min" => "يجب ان لا يقل التحصص عن 3 حرف",

            'about.required' => 'يجب اضافة تحدث عن نفسك   ',
            'about.string' => 'يجب ان يكون تحدث عن نفسك نص فقط',
            "about.max" => "يجب ان لا يزيد تحدث عن نفسك  عن 255 حرف",
            "about.min" => "يجب ان لا  يقل تحدث عن نفسك عن 3 حرف",

            'cv.required' => 'يجب ارفاق السيرة الذاتية',
            'cv.max' => 'اقصى حجم  يجب ان لا يتعدى 24م ب',
            "cv.mimes" => "pdf فقط يجب ان  يكون الملف من نوع ",
        ];
    }

    public $rule = [
        "count" => "integer|digits_between:1,50",
        "receipt" => "integer|digits_between:1,10",
        "cash" => "integer|digits_between:1,10",

        "email" => "required|email|max:100|min:3",
        "title" => "required|string|max:100|min:3",
        "name" => "required|string|max:100|min:3",
        //  "adress" => "required|string|max:255|min:3",

        "time" => "required|date",
        "name" => "required|string|max:100|min:3",
        "des" => "required|string|max:255|min:5",
        "phone" => "required|numeric|digits_between:10,10"
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [

            'phone.required' => 'يجب اضافة  رقم الجوال ',
            'phone.integer' => 'الجوال رقم فقط',
            "phone.digits_between" => "رقم الجوال يجب ان لايزيد عن 10 ارقام ",

            'des.required' => 'يجب اضافة  الوصف ',
            'des.string' => 'يجب ان يكون الوصف نص فقط',
            "des.max" => "يجب ان لا يزيد الوصف  عن 25 حرف",
            "des.min" => "يجب ان لا يقل الوصف عن 3 حرف",

            'name.required' => 'يجب اضافة  الاسم ',
            'name.string' => 'يجب ان يكون الاسم نص فقط',
            "name.max" => "يجب ان لا الاسم  عن 25 حرف",
            "name.min" => "يجب ان لا يقل الاسم عن 3 حرف",


            /*             'adress.required' => 'يجب اضافة  العنوان ',
            'adress.string' => 'يجب ان يكون العنوان نص فقط',
            "adress.max" => "يجب ان لا العنوان  عن 25 حرف",
            "adress.min" => "يجب ان لا يقل العنوان عن 3 حرف", */


            'email.required' => '  البريد الالكتروني مطلوب ',
            'email.email' => 'قيمة المدخلة ليسة بريد الكتروني',
            "email.max" => "يجب ان لا يزيدبريد الكتروني   عن 25 حرف",
            "email.min" => "يجب ان لا يقل بريد الكتروني عن 3 حرف",

            'title.required' => 'يجب اضافة عنوان الطلب  ',
            'title.string' => 'يجب ان يكون العنوان نص فقط',
            "title.max" => "يجب ان لا العنوان  عن 25 حرف",
            "title.min" => "يجب ان لا يقل العنوان عن 3 حرف",


            'cash.required' => 'يجب اضافة طرق الدفع ',
            'cash.integer' => 'يجب ان يكون العنوان نص فقط',


            'receipt.required' => 'يجب اضافة طرق الدفع ',
            'receipt.integer' => 'يجب ان يكون العنوان نص فقط',


        ];
    }

    //
    public function index()
    {
        $slides = slide::get();
        $allNumberObjects = numbers::get();
        $category = category::get();
        $clints = clients::get();
        $custmerSlide = CustmerSlide::get();


        return view('index', [
            'slides' => $slides,
            'allNumberObjects' => $allNumberObjects,
            'category' => $category,
            'custmerSlide' => $custmerSlide,
            'clints' => $clints
        ]);
    }
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        $setting = setting::first();
        return view('contact',['setting'=>$setting]);
    }

    public function SendContact(sendContactRequest $request)
    {
        //$data = $request->validate($this->ContactRule, $this->ContactmMssages());
     
        $msg= "<br>".$request['lname']."<br>".$request['fname']."<br>".$request['msg'];


        message::create([
            'from'=>1,
            'to'=>1,
            'title'=>"طلب دعم فني",
            'isred'=>0,
            'message'=>$msg,
    ]);

    $newmsg  = [];

    $newmsg['lname'] = $request['lname'];
    $newmsg['fname'] = $request['fname'];
    $newmsg['msg'] = $request['email'].'<br> '.$request['msg'];

   // Mail::to($data['email'])->send(new ContactSupport($newmsg));

       return redirect()->route('contact')->with('OkToast', ' تم ارسال الرسالة ');

    }


    public function CheckStatus()
    {
        return view('CheckStatus');
    }

    public function CheckOrderStatus(Request $request)
    {
        if (!isset($request->code)) {
            return redirect()->route('CheckStatus')->withErrors('يجب كتابة رقم الطلب');
        }
        $order  = order::where('code', $request->code)->first();

        if (!$order) {
            return redirect()->route('CheckStatus')->withErrors('رقم الطلب غير صحيح   ');
        }

        switch ($order->status) {
            case 0:
                $o_status = ' قيد الانتظار ';
                break;
            case 1:
                $o_status = ' جاري العمل عليه ';
                break;
            case 2:
                $o_status = ' جاهز للتسليم ';
                break;
            case 3:
                $o_status = ' تم التسليم';
                break;
            case 4:
                $o_status = ' مرفوض ';
                break;
            default:
                # code...
                break;
        }

        return redirect()->route('CheckStatus')->with('OkToast', ' حالة الطلب : '.$o_status.' ');
    }


    public function category()
    {
        $category = category::get();
        return view('category', ['category' => $category]);
    }



    public function SaveOrder(saveOrderRequest $request,services  $services )
    {
      //  $data = $request->validate($this->rule, $this->messages());

        $imgRoule = [];

        //$files = $services->files;  // RequiredFiles::where('type', 0)->where('service_id', $id)->get();
        foreach ($services->files as $key => $value) {
            $imgRoule[$key] = 'required|max:2048|mimes:jpg,jpeg,png';
        }

        // $request->validate($imgRoule, [
        //     'required' => 'الرجاء ارفاق الملف',
        //     'max' => 'حجم الملف يجب ان لا يتعدى 20 مب',
        //     'mimes' => 'نوع الملف يجب ان يكون jpg,jpeg,png',
        // ]);





      //  $services  = services::find($id);
        $uuidCode = rand(235164, 64655454);
        $order =  order::create([
            'title' => $request['title'],
            'name' => $request['name'],
            'des' => $request['des'],
            'phone' => $request['phone'],
            'approve_time' => 0,
            'adress' => 0,
            'files' => 0,
            'service_id' => $services->id,
            'email' => $request['email'],
            'receipt' => $request['receipt'],
            'cash' => $request['cash'],
            'count' => $request['count'],
            'time' => $request['time'],
            'ip' => $request->ip(),
            'payed' => 0,
            'status' => 0,
            'code' => $uuidCode

        ]);


        foreach ($services->files as $key => $value) {
            $filename =    $request->file($key)->store('order', 'public');
            Files::create([
                "name" => $filename,
                "typeid" =>  $order->id,
                "type" => 1,
            ]);
        }

        return redirect()->route('order' , $services->id)->with('OkToast', '  تم ارسال الطلب رقم : ' . $uuidCode);
    }


    public function order(services $services)
    {
        //$services  = services::find($id);
        $files = $services->files; //RequiredFiles::where('type', 0)->where('service_id', $services->id)->get();


        $payment = pym_to_serv::where('service_id',$services->id)->with('pym')->get();

        $cash = dev_to_serv::where('service_id',$services->id)->with('dev')->get();
        
        return view('order', ['services' => $services, 'files' => $files, 'cash' => $cash, 'payment' => $payment]);
    }

    public function services(category $category)
    {
        $services  = $category->services; //services::where('category_id', $id)->get();

        return view('services', ['services' => $services]);
    }



    public function job()
    {
        $jobs = jobs::get();
        $jobcity = job_city::get();
        return view('job', ['jobs' => $jobs, 'jobcity' => $jobcity]);
    }

    public function SaveJobs(saveJobRequest $request)
    {

        $filename = $request->file('cv')->store('cv', 'public');
        $uuidCode =Str::uuid();

        job_app::create([
            'name' => $request['name'],
            'cv' => $filename,
            'email' => $request['email'],

            'phone' => $request['phone'],
            'cert' => $request['cert'],

            'exp' => $request['exp'],
            'exp_des' => $request['exp_des'],

            'city' => $request['city'],
            'job_city' => $request['job_city'],
            'majer' => $request['majer'],

            'code' => $uuidCode,
            'job_id' => $request['job_id'],
            'about' => $request['about']


        ]);

        return redirect()->route('jobs')->with('OkToast', '  تم ارسال الطلب رقم : ' . $uuidCode);
    }
}
