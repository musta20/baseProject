<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveJobRequest;
use App\Http\Requests\SaveOrderRequest;
use App\Http\Requests\SendContactRequest;
use App\Models\Category;
use App\Models\Clients;
use App\Models\CustmerSlide;
use App\Models\Files;
use App\Models\Jobapp;
use App\Models\Jobcity;
use App\Models\Jobs;
use App\Models\Message;
use App\Models\Numbers;
use App\Models\Order;
use App\Models\Services;
use App\Models\Setting;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Mainsite extends Controller
{
    public function index()
    {
        $slides = Slide::get();
        $allNumberObjects = numbers::get();
        $category = Category::take(10)->get();
        $clints = Clients::get();
        $custmerSlide = CustmerSlide::get();

        $services = Services::get()->take(10);

        return view('index', [
            'slides' => $slides,
            'allNumberObjects' => $allNumberObjects,
            'category' => $category,
            'custmerSlide' => $custmerSlide,
            'clints' => $clints,
            'services' => $services,
        ]);
    }

    public function term()
    {

        return view('term');

    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        $setting = Setting::first();

        return view('contact', ['setting' => $setting]);
    }

    public function sendContact(SendContactRequest $request)
    {

        $msg = '<br>' . $request['lname'] . '<br>' . $request['fname'] . '<br>' . $request['msg'];

        Message::create([
            'from' => 1,
            'to' => 1,
            'title' => 'طلب دعم فني',
            'isred' => 0,
            'message' => $msg,
        ]);

        $newmsg = [];

        $newmsg['lname'] = $request['lname'];
        $newmsg['fname'] = $request['fname'];
        $newmsg['msg'] = $request['email'] . '<br> ' . $request['msg'];

        // Mail::to($data['email'])->send(new ContactSupport($newmsg));

        return redirect()->route('contact')->with('OkToast', ' تم ارسال الرسالة ');

    }

    public function checkStatus()
    {
        return view('CheckStatus');
    }

    public function checkOrderStatus(Request $request)
    {
        if (! isset($request->code)) {
            return redirect()->route('checkStatus')->withErrors('يجب كتابة رقم الطلب');
        }
        $order = Order::where('code', $request->code)->first();

        if (! $order) {
            return redirect()->route('checkStatus')->withErrors('رقم الطلب غير صحيح   ');
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
                // code...
                break;
        }

        return redirect()->route('checkStatus')->with('OkToast', ' حالة الطلب : ' . $o_status . ' ');
    }

    public function category()
    {
        $category = Category::paginate(10);

        return view('category', ['category' => $category]);
    }

    public function saveOrder(SaveOrderRequest $request, Services $services)
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
        $order = Order::create([
            'title' => $request['title'],
            'name' => $request['name'],
            'des' => $request['des'],
            'phone' => $request['phone'],
            'approve_time' => 0,
            'adress' => 0,
            'files' => 0,
            'service_id' => $services->id,
            'email' => $request['email'],
            'payment_id' => $request['payment_id'],
            'delivery_id' => $request['delivery_id'],
            'count' => $request['count'],
            'time' => $request['time'],
            'ip' => $request->ip(),
            'payed' => 0,
            'status' => 0,
            'code' => $uuidCode,

        ]);

        foreach ($services->files as $key => $value) {
            $filename = $request->file($key)->store('order', 'public');
            Files::create([
                'name' => $filename,
                'typeid' => $order->id,
                'type' => 1,
            ]);
        }

        return redirect()->route('order', $services->id)->with('OkToast', '  تم ارسال الطلب رقم : ' . $uuidCode);
    }

    public function order(services $services)
    {
        //$services  = services::find($id);
        $files = $services->files; //RequiredFiles::where('type', 0)->where('service_id', $services->id)->get();

        //   $payment = Pymtoserv::where('service_id', $services->id)->with('pym')->get();

        //  $cash = Devtoserv::where('service_id', $services->id)->with('dev')->get();

        return view('order', ['services' => $services, 'files' => $files, 'cash' => $services->deliveries(), 'payment' => $services->payments()]);
    }

    public function services(Category $category)
    {

        $services = $category->services; //services::where('category_id', $id)->get();

        return view('services', ['services' => $services]);
    }

    public function job()
    {
        $jobs = Jobs::get();
        $jobcity = Jobcity::get();

        return view('job', ['jobs' => $jobs, 'jobcity' => $jobcity]);
    }

    public function saveJobs(SaveJobRequest $request)
    {

        $filename = $request->file('cv')->store('cv', 'public');
        $uuidCode = Str::uuid();

        Jobapp::create([
            'name' => $request['name'],
            'cv' => $filename,
            'email' => $request['email'],

            'phone' => $request['phone'],
            'cert' => $request['cert'],

            'exp' => $request['exp'],
            'exp_des' => $request['exp_des'],

            'city' => $request['city'],
            'Jobcity' => $request['Jobcity'],
            'majer' => $request['majer'],

            'code' => $uuidCode,
            'job_id' => $request['job_id'],
            'about' => $request['about'],

        ]);

        return redirect()->route('jobs')->with('OkToast', '  تم ارسال الطلب رقم : ' . $uuidCode);
    }
}
