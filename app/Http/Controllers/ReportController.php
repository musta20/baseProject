<?php

namespace App\Http\Controllers;

use App\Enums\ReportTtpe;
use App\Models\order;
use App\Models\Report;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PDF;


class ReportController extends Controller
{
    public $rule = [
        "from" => "required|date",
        "to" => "required|date",

    ];

    public function messages()
    {
        return [
            'from.required' => 'يجب اختيار التاريخ',
            'from.date' => 'يجب ان تكون القيمة  تاريخ',
 

            'to.required' => 'يجب اختيار التاريخ',
            'to.date' => 'يجب ان تكون القيمة تاريخ',


        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.report.index');
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
    public function store(Request $request)
    {
         $request->validate( $this->rule,$this->messages());
   
        if ($request->reporttype == ReportTtpe::CASH->value) {

            $reports = order::whereBetween('created_at', [$request->from, $request->to])
                ->with('servicesNmae')->get();
                
                if($reports->isEmpty())
                {
                    return Redirect::back()->with('messages', 'لا يوجد سجلات للتواريخ المذكورة');
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
            Report::create(["type" => $request->type, "reporttype" => ReportTtpe::CASH->value, "from" => $request->from, "to" => $request->from, "file" => $filename]);
            return $pdf->inline();
        }



        if ($request->reporttype == ReportTtpe::ORDER->value) {
            if ($request->type == '6') {
                $reports = order::whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
            } else {
                $reports = order::where('status', $request->type)->whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
            }

            if($reports->isEmpty())
            {
                return Redirect::back()->with('messages', 'لا يوجد سجلات للتواريخ المذكورة');
            }

            $filename = $request->reporttype . '_' . $request->from . '_' . $request->to . '.pdf';
            $pdf = PDF::loadView('admin.pdf.report', ['from' => $request->from, 'to' => $request->to, 'reports' => $reports, "type" => $request->type])
                ->setOption('enable-local-file-access', true)
                ->setOption('margin-bottom', '0mm')
                ->setOption('margin-top', '0mm')
                ->setOption('margin-right', '0mm')
                ->setOption('margin-left', '0mm')->save(storage_path('app/public/pdf/') . $filename, true);
            Report::create(["type" => $request->type, "reporttype" => ReportTtpe::ORDER->value, "from" => $request->from, "to" => $request->from, "file" => $filename]);
            return $pdf->inline();
        }
    }

    public function BillInnerPrint($id)
    {
        $setting = setting::first();
        $order = order::with('servicesNmae')->with('dev')->with('pym')->find($id);
       // dd($order);
        if (!$order->first()) {
            return Redirect::back()->with('messages', 'غير موجود ');
        }


        if ($order->payed == 0) {

            return Redirect::back()->with('messages', 'يجب دفع جزء من المبلغ  لإصدار الفاتورة');
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
            "reporttype" =>ReportTtpe::BILL->value,
            "to" => $order->name,
            "from" => "none",
            "file" => $filename
        ]);

        return $pdf->inline();
    }









    public function Billprint($id)
    {
        $setting = setting::first();
        $order = order::with('servicesNmae')->find($id);

        if (!$order->first()) {
            return Redirect::back()->with('messages', 'غير موجود ');
        }
        if ($order->payed == 0) {
            return Redirect::back()->with('messages', 'يجب دفع جزء من المبلغ  لإصدار الفاتورة');
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
            "reporttype" => ReportTtpe::BILL->value,
            "to" => $order->name,
            "from" => "none",
            "file" => $filename
        ]);

        return $pdf->inline();
    }


    public function showPdfReport(Request $request)
    {
        $request->validate( $this->rule,$this->messages());
 
        if ($request->type == 1) {
            $reports = order::whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
            if($reports->isEmpty())
            {
                return  Redirect::back()->with('messages', 'لا يوجد سجلات  ');
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
        $orderReport = Report::latest()->paginate(10);
        return view('admin.report.order', ['orderReport' => $orderReport]);
    }
    public function billReportView()
    {     $orderReport = Report::
        where('reporttype', ReportTtpe::BILL->value)
        ->paginate(10);
        return view('admin.report.bills', ['orderReport' => $orderReport]);
    }
    public function billReport(Request $request)
    {
        $request->validate( $this->rule,$this->messages());

        if ($request->from && $request->to) {
            if ($request->type) {
                $orderReport = Report::where('type', $request->type)
                    ->where('reporttype', ReportTtpe::BILL->value)->whereBetween('created_at', [$request->from, $request->to])
                    ->paginate(10);
                
            } else {
                $orderReport = Report::where('reporttype', ReportTtpe::BILL->value)->whereBetween('created_at', [$request->from, $request->to])
                    ->paginate(10);
                 
            }
        } else {
            if (isset($request->type)) {
                $orderReport = Report::where('type', $request->type)
                    ->where('reporttype',  ReportTtpe::BILL->value)->latest()->paginate(10);
            } else {
                $orderReport = Report::where('reporttype',  ReportTtpe::BILL->value)->latest()->paginate(10);
            }
        }
        if($orderReport->isEmpty())
        {
            return  Redirect::back()->with('messages', 'لا يوجد سجلات  ');
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
        $orderReport = Report::where('reporttype',  ReportTtpe::CASH->value)->latest()->paginate(10);

        return view('admin.report.cash', ['orderReport' => $orderReport]);
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
    public function destroy($id)
    {
        $file = Report::find($id);
        $file->delete();
        return  Redirect::back()->with('messages', 'تم حذف العنصر');

        //
    }
}
