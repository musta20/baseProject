<?php

namespace App\Http\Controllers;

use App\Enums\ReportType;
use App\Models\Files;
use App\Models\job_app;
use App\Models\order;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    
    public function search(Request $request)
    {


        switch ($request->type) {
            case '1':
                // $resault = order::find($request->keyword);
                $order = order::with('servicesNmae')->with('dev')->with('pym')->find($request->keyword);

                if(!$order)
                {
                    return view('admin.search.index', ['resault' => true]);

                }
           

                $order->price = $order->count * $order->servicesNmae->price;

                $order->ServiceName = $order->servicesNmae->name; //still

                $order->still = $order->price - $order->payed;   //still

                $files = Files::where('type', 1)->where('typeid', $order->id)->get();


                switch ($order->status) {
                    case 0:
                        $order->status_order = "قيد الانتظار";
                        break;
                    case 1:
                        $order->status_order = "جاري العمل عليه";
                        break;
                    case 2:
                        $order->status_order = "جاهز للتسليم";
                        break;
                    case 3:
                        $order->status_order = " تم تسليمه";
                        break;
                    case 4:
                        $order->status_order = " ملغي";
                        break;
                    default:
                        # code...
                        break;
                }



                return view("admin.order.edit",  ['order' =>  $order, "files" => $files]);

                //  return view('admin.search.index', ['resault' => $resault, 'type' => $request->type]);
                break;

            case '2':

                $job = job_app::with('job')->where('code', $request->keyword)->first();

                if(!$job)
                {
                    return view('admin.search.index', ['resault' => true]);

                }

                return view("admin.jobs.jobApp.show",  ['job' => $job]);

                // $resault = job_app::where('code', $request->keyword)->first();
                break;

            case '3':
                $resault = Report::where('type', 0)->where('reporttype',  ReportType::BILL->value)->where('id', $request->keyword)->first();
                if(!$resault)
                {
                    return view('admin.search.index', ['resault' => true]);

                }

                
                return redirect('/storage/pdf/'.$resault->file);

                break;

            default:
                # code...
                break;
        }
    }
}
