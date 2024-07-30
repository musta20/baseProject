<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\saveJobRequest;
use App\Http\Requests\saveOrderRequest;
use App\Http\Requests\sendContactRequest;
use App\Models\Category;
use App\Models\Clients;
use App\Models\CustmerSlide;
use App\Models\Devtoserv;
use App\Models\Files;
use App\Models\Jobapp;
use App\Models\Jobcity;
use App\Models\Jobs;
use App\Models\Message;
use App\Models\Numbers;
use App\Models\Order;
use App\Models\Pymtoserv;
use App\Models\Services;
use App\Models\Setting;
use App\Models\Slide;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainsiteApiController extends Controller
{
    public function index(): JsonResponse
    {
        $slides = Slide::get();
        $allNumberObjects = Numbers::get();
        $category = Category::take(10)->get();
        $clients = Clients::get();
        $customerSlide = CustmerSlide::get();
        $services = Services::take(10)->get();

        return response()->json([
            'slides' => $slides,
            'allNumberObjects' => $allNumberObjects,
            'category' => $category,
            'customerSlide' => $customerSlide,
            'clients' => $clients,
            'services' => $services,
        ]);
    }

    public function term(): JsonResponse
    {
        // Assuming you have a Term model or want to return some static data
        return response()->json(['terms' => 'Your terms and conditions here']);
    }

    public function about(): JsonResponse
    {
        // Assuming you have an About model or want to return some static data
        return response()->json(['about' => 'Your about information here']);
    }

    public function contact(): JsonResponse
    {
        $setting = Setting::first();

        return response()->json(['setting' => $setting]);
    }

    public function sendContact(sendContactRequest $request): JsonResponse
    {
        $msg = '<br>' . $request['lname'] . '<br>' . $request['fname'] . '<br>' . $request['msg'];

        $message = Message::create([
            'from' => 1,
            'to' => 1,
            'title' => 'طلب دعم فني',
            'isred' => 0,
            'message' => $msg,
        ]);

        return response()->json(['message' => 'Message sent successfully', 'data' => $message], 201);
    }

    public function checkOrderStatus(Request $request): JsonResponse
    {
        $request->validate([
            'code' => 'required',
        ]);

        $order = Order::where('code', $request->code)->first();

        if (! $order) {
            return response()->json(['error' => 'Invalid order code'], 404);
        }

        $statusMap = [
            0 => 'قيد الانتظار',
            1 => 'جاري العمل عليه',
            2 => 'جاهز للتسليم',
            3 => 'تم التسليم',
            4 => 'مرفوض',
        ];

        $status = $statusMap[$order->status] ?? 'Unknown status';

        return response()->json(['status' => $status]);
    }

    public function category(): JsonResponse
    {
        $category = Category::paginate(10);

        return response()->json($category);
    }

    public function saveOrder(saveOrderRequest $request, Services $services): JsonResponse
    {
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

        $files = [];
        foreach ($services->files as $key => $value) {
            $filename = $request->file($key)->store('order', 'public');
            $file = Files::create([
                'name' => $filename,
                'typeid' => $order->id,
                'type' => 1,
            ]);
            $files[] = $file;
        }

        return response()->json(['message' => 'Order created successfully', 'order' => $order, 'files' => $files], 201);
    }

    public function order(Services $services): JsonResponse
    {
        $files = $services->files;
        $payment = Pymtoserv::where('service_id', $services->id)->with('pym')->get();
        $cash = Devtoserv::where('service_id', $services->id)->with('dev')->get();

        return response()->json([
            'services' => $services,
            'files' => $files,
            'cash' => $cash,
            'payment' => $payment,
        ]);
    }

    public function services(Category $category): JsonResponse
    {
        $services = $category->services;

        return response()->json(['services' => $services]);
    }

    public function job(): JsonResponse
    {
        $jobs = Jobs::get();
        $jobcity = Jobcity::get();

        return response()->json(['jobs' => $jobs, 'jobcity' => $jobcity]);
    }

    public function saveJobs(saveJobRequest $request): JsonResponse
    {
        $filename = $request->file('cv')->store('cv', 'public');
        $uuidCode = Str::uuid();

        $jobapp = Jobapp::create([
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

        return response()->json(['message' => 'Job application submitted successfully', 'jobapp' => $jobapp], 201);
    }
}
