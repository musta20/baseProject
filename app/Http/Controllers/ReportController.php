<?php

namespace App\Http\Controllers;

use App\Enums\CashReport;
use App\Enums\OrderStatus;
use App\Enums\ReportType;
use App\Enums\Sorting;
use App\Http\Requests\showPdfReportRequest;
use App\Http\Requests\storeReportRequest;
use App\Models\order;
use App\Models\Report;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PDF;


class ReportController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.report.main');
    }

    public function main()
    {
        return view('admin.report.main');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeReportRequest $request)
    {

        
        if ($request->reporttype == ReportType::CASH->value) {

            $reports = order::whereBetween('created_at', [$request->from, $request->to])
                ->with('servicesNmae')->get();
                
                if($reports->isEmpty())
                {
                    return Redirect::back()->with('ErorrToast', 'لا يوجد سجلات للتواريخ المذكورة');
                }

            $filename = $request->reporttype . '_' . $request->from . '_' . $request->to . '.pdf';
            $pdf = PDF::loadView(
                'admin.pdf.reportcash',
                [
                    'from' => $request->from, 'to' => $request->to,
                    'reports' => $reports, "type" => $request->type
                ]
            )
                ->setOption('enable-local-file-access', true)
                ->setOption('margin-bottom', '0mm')
                ->setOption('margin-top', '0mm')
                ->setOption('margin-right', '0mm')
                ->setOption('margin-left', '0mm')->save(storage_path('app/public/pdf/') . $filename, true);

            Report::create(["type" => $request->type, "reporttype" => ReportType::CASH->value, "from" => $request->from, "to" => $request->from, "file" => $filename]);
            return $pdf->inline();
        }



        if ($request->reporttype == ReportType::ORDER->value) {
            if ($request->type == '6') {
                $reports = order::whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
            } else {
                $reports = order::where('status', $request->type)->whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
            }

            if($reports->isEmpty())
            {
                return Redirect::back()->with('ErorrToast', 'لا يوجد سجلات للتواريخ المذكورة');
            }

            $filename = $request->reporttype . '_' . $request->from . '_' . $request->to . '.pdf';
            $pdf = PDF::loadView('admin.pdf.report', ['from' => $request->from, 'to' => $request->to, 'reports' => $reports, "type" => $request->type])
                ->setOption('enable-local-file-access', true)
                ->setOption('margin-bottom', '0mm')
                ->setOption('margin-top', '0mm')
                ->setOption('margin-right', '0mm')
                ->setOption('margin-left', '0mm')->save(storage_path('app/public/pdf/') . $filename, true);
            Report::create(["type" => $request->type, "reporttype" => ReportType::ORDER->value, "from" => $request->from, "to" => $request->from, "file" => $filename]);
            return $pdf->inline();
        }
    }

    public function BillInnerPrint($id)
    {
        $setting = setting::first();
        $order = order::with('servicesNmae')->with('user')->with('delivery')->with('payment')->find($id);

        if (!$order) {
            return Redirect::back()->with('OkToast', 'غير موجود ');
        }


        if ($order->payed == 0) {

            return Redirect::back()->with('OkToast', 'يجب دفع جزء من المبلغ  لإصدار الفاتورة');
        }

        $filename = 'InnerInvoice' . sprintf('%04d', $order->id) . '.pdf';
        $fileName2 =  Storage::get('public/logo/h.png');
        $dataUri = 'data:image/png;base64,' . base64_encode($fileName2);
        $pdf = PDF::loadView(
            'admin.pdf.ineerBill',
            [
                'setting' => $setting,
                'order' => $order,
                "dataUri" => $dataUri
            ]
        )

            ->setOption('enable-local-file-access', true)
            ->setOption('margin-bottom', '0mm')
            ->setOption('margin-top', '0mm')
            ->setOption('margin-right', '0mm')
            ->setOption('margin-left', '0mm')->save(storage_path('app/public/pdf/') . $filename, true);

        Report::create([
            "type" => 1,
            "reporttype" =>ReportType::BILL->value,
            "to" => $order->name,
            "from" => "none",
            "file" => $filename
        ]);

        return $pdf->inline();
    }



    public function Billprint(order $order)
    {
        $setting = setting::first();

        if (!$order->first()) {
            return Redirect::back()->with('OkToast', 'غير موجود ');
        }
        if ($order->payed == 0) {
            return Redirect::back()->with('OkToast', 'يجب دفع جزء من المبلغ  لإصدار الفاتورة');
        }

        $filename = 'invoice' . sprintf('%04d', $order->id) . '.pdf';
        $fileName2 =  Storage::get('public/logo/h.png');
        $dataUri = 'data:image/png;base64,' . base64_encode($fileName2);
        $pdf = PDF::loadView(
            'admin.pdf.bill',
            [
                'setting' => $setting,
                'order' => $order,
                "dataUri" => $dataUri
            ]
        )
            ->setOption('page-width', '80mm')
            ->setOption('page-height', '190mm')
            ->setOption('enable-local-file-access', true)
            ->setOption('margin-bottom', '0mm')
            ->setOption('margin-top', '0mm')
            ->setOption('margin-right', '0mm')
            ->setOption('margin-left', '0mm')->save(storage_path('app/public/pdf/') . $filename, true);

        Report::create([
            "type" => 0,
            "reporttype" => ReportType::BILL->value,
            "to" => $order->name,
            "from" => "none",
            "file" => $filename
        ]);

        return $pdf->inline();
    }


    public function showPdfReport(showPdfReportRequest $request)
    {
        //$request->validate( $this->rule,$this->messages());
 
        if ($request->type == 1) {
            $reports = order::whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
            if($reports->isEmpty())
            {
                return  Redirect::back()->with('OkToast', 'لا يوجد سجلات  ');
            }
            return view('admin.pdf.report', ['from' => $request->from, 'to' => $request->to, 'reports' => $reports]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    public function orderReport()
    {


        // case  = 0;
        // case ORDER_RECEIVED  = 1;
        // case COMPLETED_ORDER  = 2;
        // case DELIVERED_ORDER = 3;
        // case CANCLED_ORDER = 4;

        $filterBox = Report::ShowCustomFilter(filterFiled:[
            [
                "lable" =>"طلبات جديدة",
                "orderType" => Sorting::EQULE, 
                "value" => OrderStatus::NEW_ORDER->value, 
                "name" => "type"
            ],
            [
                "lable" =>"طلبات مستلمة",
                "orderType" => Sorting::EQULE, 
                "value" => OrderStatus::ORDER_RECEIVED->value, 
                "name" => "type"
            ]
           
        ]);

        $orderReport = Report::Filter()->where('reporttype',  ReportType::ORDER->value)->RequestPaginate();
        
        return view('admin.report.order', ['orderReport' => $orderReport, 'filterBox' => $filterBox]);
    }
    public function billReportView()
    {

        $filterBox = Report::ShowCustomFilter(filterFiled:[
            [
                "lable" =>"فاتورة داخلية",
                "orderType" => Sorting::EQULE, 
                "value" => 1, 
                "name" => "type"
            ],
            [
                "lable" => "فاتورة زبون	"  ,
                "orderType" => Sorting::EQULE, 
                "value" => 0, 
                "name" => "type"
            ],
        ]);

        $orderReport = Report::Filter()->
        where('reporttype', ReportType::BILL->value)->RequestPaginate();
        return view('admin.report.bills', ['orderReport' => $orderReport,'filterBox' => $filterBox]);

    }
    public function billReport(showPdfReportRequest $request)
    {
      //  $request->validate( $this->rule,$this->messages());

        if ($request->from && $request->to) {
            if ($request->type) {
                $orderReport = Report::where('type', $request->type)
                    ->where('reporttype', ReportType::BILL->value)->whereBetween('created_at', [$request->from, $request->to])
                    ->paginate(10);
                
            } else {
                $orderReport = Report::where('reporttype', ReportType::BILL->value)->whereBetween('created_at', [$request->from, $request->to])
                    ->paginate(10);
                 
            }
        } else {
            if (isset($request->type)) {
                $orderReport = Report::where('type', $request->type)
                    ->where('reporttype',  ReportType::BILL->value)->latest()->paginate(10);
            } else {
                $orderReport = Report::where('reporttype',  ReportType::BILL->value)->latest()->paginate(10);
            }
        }
        if($orderReport->isEmpty())
        {
            return  Redirect::back()->with('OkToast', 'لا يوجد سجلات  ');
        }
        return view('admin.report.bills', ['orderReport' => $orderReport]);
    }


//
public function printCreateBill()
{

    return view('admin.report.createBill');
}

public function createBill()
{

    return view('admin.report.createBill');
}


public function postCreateBill(Request $request)
{

    $setting = setting::first();
  

    $filename = 'invoice' . sprintf('%04d', $request->id) . '.pdf';
    $fileName2 =  Storage::get('public/logo/h.png');
    $dataUri = 'data:image/png;base64,' . base64_encode($fileName2);
    $pdf = PDF::loadView(
        'admin.pdf.createbill',
        [
            'setting' => $setting,
            'order' => $request,
            "dataUri" => $dataUri
        ]
    )
        ->setOption('page-width', '80mm')
        ->setOption('page-height', '190mm')
        ->setOption('enable-local-file-access', true)
        ->setOption('margin-bottom', '0mm')
        ->setOption('margin-top', '0mm')
        ->setOption('margin-right', '0mm')
        ->setOption('margin-left', '0mm')->save(storage_path('app/public/pdf/') . $filename, true);

    Report::create([
        "type" => 0,
        "reporttype" => "bill",
        "to" => $request->name,
        "from" => "none",
        "file" => $filename
    ]);
    return $pdf->inline();

}



    public function cashReport()
    {
       
        $filterBox = Report::ShowCustomFilter(filterFiled:[
            [
                "lable" =>"مدفوع بالكامل",
                "orderType" => Sorting::EQULE, 
                "value" => CashReport::FULLY_PAID->value, 
                "name" => "type"
            ],
            [
                "lable" =>"مدفوع جزئيا",
                "orderType" => Sorting::EQULE, 
                "value" => CashReport::PARTILY_PAYED->value, 
                "name" => "type"
            ],
            [
                "lable" =>"غير مدفوع",
                "orderType" => Sorting::EQULE, 
                "value" => CashReport::NOT_PAYED->value, 
                "name" => "type"
            ],
        ]);        $orderReport = Report::Filter()->where('reporttype',  ReportType::CASH->value)->RequestPaginate(10);

        return view('admin.report.cash', ['orderReport' => $orderReport, 'filterBox' => $filterBox]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $file )
    {
        $file->delete();
        return  Redirect::back()->with('OkToast', 'تم حذف العنصر');

        //
    }
}
