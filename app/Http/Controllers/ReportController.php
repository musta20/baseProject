<?php

namespace App\Http\Controllers;

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
        if ($request->reporttype == "cash") {

            $reports = order::whereBetween('created_at', [$request->from, $request->to])
                ->with('servicesNmae')->get();

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
            Report::create(["type" => $request->type, "reporttype" => "cash", "from" => $request->from, "to" => $request->from, "file" => $filename]);
            return $pdf->inline();
        }



        if ($request->reporttype == "order") {
            if ($request->type == '6') {
                $reports = order::whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
            } else {
                $reports = order::where('status', $request->type)->whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
            }
            $filename = $request->reporttype . '_' . $request->from . '_' . $request->to . '.pdf';
            $pdf = PDF::loadView('admin.pdf.report', ['from' => $request->from, 'to' => $request->to, 'reports' => $reports, "type" => $request->type])
                ->setOption('enable-local-file-access', true)
                ->setOption('margin-bottom', '0mm')
                ->setOption('margin-top', '0mm')
                ->setOption('margin-right', '0mm')
                ->setOption('margin-left', '0mm')->save(storage_path('app/public/pdf/') . $filename, true);
            Report::create(["type" => $request->type, "reporttype" => "order", "from" => $request->from, "to" => $request->from, "file" => $filename]);
            return $pdf->inline();
        }
    }

    public function BillInnerPrint($id)
    {
        $setting = setting::first();
        $order = order::with('servicesNmae')->with('dev')->with('pym')->find($id);
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
            "reporttype" => "bill",
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
            "reporttype" => "bill",
            "to" => $order->name,
            "from" => "none",
            "file" => $filename
        ]);

        return $pdf->inline();
    }


    public function showPdfReport(Request $request)
    {
        if ($request->type == 1) {
            $reports = order::whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();

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

    public function billReport(Request $request)
    {

        if ($request->from && $request->to) {
            if ($request->type) {
                $orderReport = Report::where('type', $request->type)
                    ->where('reporttype', 'bill')->whereBetween('created_at', [$request->from, $request->to])
                    ->paginate(10);
            } else {
                $orderReport = Report::where('reporttype', 'bill')->whereBetween('created_at', [$request->from, $request->to])
                    ->paginate(10);
            }
        } else {
            if (isset($request->type)) {
                $orderReport = Report::where('type', $request->type)
                    ->where('reporttype', 'bill')->latest()->paginate(10);
            } else {
                $orderReport = Report::where('reporttype', 'bill')->latest()->paginate(10);
            }
        }

        return view('admin.report.bills', ['orderReport' => $orderReport]);
    }

    public function cashReport()
    {
        $orderReport = Report::where('reporttype', 'cash')->latest()->paginate(10);

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
        return redirect('/admin/orderReport/')->with('messages', 'تم حذف العنصر');

        //
    }
}
