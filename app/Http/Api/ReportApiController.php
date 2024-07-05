<?php

namespace App\Http\Controllers\Api;

use App\Enums\CashReport;
use App\Enums\OrderStatus;
use App\Enums\ReportType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShowPdfReportRequest;
use App\Http\Requests\StoreReportRequest;
use App\Models\Order;
use App\Models\Report;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class ReportApiController extends Controller
{
    /**
     * Store a newly created report in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        if (!Storage::disk('public')->exists('pdf')) {
            Storage::disk('public')->makeDirectory('pdf');
        }

        if ($request->reporttype == ReportType::CASH->value) {
            return $this->generateCashReport($request);
        }

        if ($request->reporttype == ReportType::ORDER->value) {
            return $this->generateOrderReport($request);
        }
    }

    /**
     * Generate and return a cash report.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    private function generateCashReport(StoreReportRequest $request)
    {
        $reports = Order::whereBetween('created_at', [$request->from, $request->to])
            ->with('servicesNmae')
            ->get();

        if ($reports->isEmpty()) {
            return response()->json(['message' => 'No records found for the given dates.'], 404);
        }

        $filename = $request->reporttype . '_' . $request->from . '_' . $request->to . '.pdf';
        $pdf = PDF::loadView(
            'admin.pdf.reportcash',
            [
                'from' => $request->from,
                'to' => $request->to,
                'reports' => $reports,
                'type' => $request->type,
            ]
        )
            ->setOption('enable-local-file-access', true)
            ->setOption('margin-bottom', '0mm')
            ->setOption('margin-top', '0mm')
            ->setOption('margin-right', '0mm')
            ->setOption('margin-left', '0mm')
            ->save(storage_path('app/public/pdf/') . $filename, true);

        Report::create([
            'type' => $request->type,
            'reporttype' => ReportType::CASH->value,
            'from' => $request->from,
            'to' => $request->from,
            'file' => $filename,
        ]);

        return response()->file(storage_path('app/public/pdf/') . $filename);
    }

    /**
     * Generate and return an order report.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    private function generateOrderReport(StoreReportRequest $request)
    {
        if ($request->type == '6') {
            $reports = Order::whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
        } else {
            $reports = Order::where('status', $request->type)->whereBetween('created_at', [$request->from, $request->to])->with('servicesNmae')->get();
        }

        if ($reports->isEmpty()) {
            return response()->json(['message' => 'No records found for the given dates.'], 404);
        }

        $filename = $request->reporttype . '_' . $request->from . '_' . $request->to . '.pdf';
        $pdf = PDF::loadView('admin.pdf.report', ['from' => $request->from, 'to' => $request->to, 'reports' => $reports, 'type' => $request->type])
            ->setOption('enable-local-file-access', true)
            ->setOption('margin-bottom', '0mm')
            ->setOption('margin-top', '0mm')
            ->setOption('margin-right', '0mm')
            ->setOption('margin-left', '0mm')
            ->save(storage_path('app/public/pdf/') . $filename, true);

        Report::create([
            'type' => $request->type,
            'reporttype' => ReportType::ORDER->value,
            'from' => $request->from,
            'to' => $request->from,
            'file' => $filename,
        ]);

        return response()->file(storage_path('app/public/pdf/') . $filename);
    }

    /**
     * Remove the specified report from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return response()->json(['message' => 'Report deleted successfully.']);
    }

    /**
     * Generate and return an inner bill.
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function billInnerPrint($id)
    {
        $setting = Setting::first();
        $order = Order::with('servicesNmae')->with('user')->with('delivery')->with('payment')->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        if ($order->payed == 0) {
            return response()->json(['message' => 'A portion of the amount must be paid to issue the invoice.'], 400);
        }

        $filename = 'InnerInvoice' . sprintf('%04d', $order->id) . '.pdf';
        $fileName2 = Storage::get('public/logo/h.png');
        $dataUri = 'data:image/png;base64,' . base64_encode($fileName2);
        $pdf = PDF::loadView(
            'admin.pdf.ineerBill',
            [
                'setting' => $setting,
                'order' => $order,
                'dataUri' => $dataUri,
            ]
        )
            ->setOption('enable-local-file-access', true)
            ->setOption('margin-bottom', '0mm')
            ->setOption('margin-top', '0mm')
            ->setOption('margin-right', '0mm')
            ->setOption('margin-left', '0mm')
            ->save(storage_path('app/public/pdf/') . $filename, true);

        Report::create([
            'type' => 1,
            'reporttype' => ReportType::BILL->value,
            'to' => $order->name,
            'from' => 'none',
            'file' => $filename,
        ]);

        return response()->file(storage_path('app/public/pdf/') . $filename);
    }

    /**
     * Generate and return a bill for a given order.
     *
     * @param  \App\Models\Order  $order
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function billPrint(Order $order)
    {
        $setting = Setting::first();

        if (!$order->first()) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        if ($order->payed == 0) {
            return response()->json(['message' => 'A portion of the amount must be paid to issue the invoice.'], 400);
        }

        $filename = 'invoice' . sprintf('%04d', $order->id) . '.pdf';
        $fileName2 = Storage::get('public/logo/h.png');
        $dataUri = 'data:image/png;base64,' . base64_encode($fileName2);
        $pdf = PDF::loadView(
            'admin.pdf.bill',
            [
                'setting' => $setting,
                'order' => $order,
                'dataUri' => $dataUri,
            ]
        )
            ->setOption('page-width', '80mm')
            ->setOption('page-height', '190mm')
            ->setOption('enable-local-file-access', true)
            ->setOption('margin-bottom', '0mm')
            ->setOption('margin-top', '0mm')
            ->setOption('margin-right', '0mm')
            ->setOption('margin-left', '0mm')
            ->save(storage_path('app/public/pdf/') . $filename, true);

        Report::create([
            'type' => 0,
            'reporttype' => ReportType::BILL->value,
            'to' => $order->name,
            'from' => 'none',
            'file' => $filename,
        ]);

        return response()->file(storage_path('app/public/pdf/') . $filename);
    }

    /**
     * Display a listing of order reports.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderReport(Request $request)
    {
        $filterBox = Report::showCustomFilter(filterFiled: [
            [
                'lable' => 'New Orders',
                'orderType' => Sorting::EQULE,
                'value' => OrderStatus::NEW_ORDER->value,
                'name' => 'type',
            ],
            [
                'lable' => 'Received Orders',
                'orderType' => Sorting::EQULE,
                'value' => OrderStatus::ORDER_RECEIVED->value,
                'name' => 'type',
            ],

        ]);

        $orderReport = Report::Filter()->where('reporttype', ReportType::ORDER->value)->RequestPaginate();

        return response()->json(['reports' => $orderReport, 'filter' => $filterBox]);
    }

    /**
     * Display a listing of bill reports.
     *
     * @return \Illuminate\Http\Response
     */
    public function billReportView()
    {
        $filterBox = Report::showCustomFilter(filterFiled: [
            [
                'lable' => 'Internal Invoice',
                'orderType' => Sorting::EQULE,
                'value' => 1,
                'name' => 'type',
            ],
            [
                'lable' => 'Customer Invoice',
                'orderType' => Sorting::EQULE,
                'value' => 0,
                'name' => 'type',
            ],
        ]);

        $orderReport = Report::Filter()
            ->where('reporttype', ReportType::BILL->value)
            ->RequestPaginate();

        return response()->json(['reports' => $orderReport, 'filter' => $filterBox]);
    }

    /**
     * Display a listing of bill reports based on filters.
     *
     * @param  \App\Http\Requests\ShowPdfReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function billReport(ShowPdfReportRequest $request)
    {
        if ($request->from && $request->to) {
            if ($request->type) {
                $orderReport = Report::where('type', $request->type)
                    ->where('reporttype', ReportType::BILL->value)
                    ->whereBetween('created_at', [$request->from, $request->to])
                    ->paginate(10);
            } else {
                $orderReport = Report::where('reporttype', ReportType::BILL->value)
                    ->whereBetween('created_at', [$request->from, $request->to])
                    ->paginate(10);
            }
        } else {
            if (isset($request->type)) {
                $orderReport = Report::where('type', $request->type)
                    ->where('reporttype', ReportType::BILL->value)
                    ->latest()
                    ->paginate(10);
            } else {
                $orderReport = Report::where('reporttype', ReportType::BILL->value)
                    ->latest()
                    ->paginate(10);
            }
        }

        if ($orderReport->isEmpty()) {
            return response()->json(['message' => 'No records found.'], 404);
        }

        return response()->json(['reports' => $orderReport]);
    }

    /**
     * Generate and return a custom bill.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function postCreateBill(Request $request)
    {
        $setting = Setting::first();

        $filename = 'invoice' . sprintf('%04d', $request->id) . '.pdf';
        $fileName2 = Storage::get('public/logo/h.png');
        $dataUri = 'data:image/png;base64,' . base64_encode($fileName2);
        $pdf = PDF::loadView(
            'admin.pdf.createbill',
            [
                'setting' => $setting,
                'order' => $request,
                'dataUri' => $dataUri,
            ]
        )
            ->setOption('page-width', '80mm')
            ->setOption('page-height', '190mm')
            ->setOption('enable-local-file-access', true)
            ->setOption('margin-bottom', '0mm')
            ->setOption('margin-top', '0mm')
            ->setOption('margin-right', '0mm')
            ->setOption('margin-left', '0mm')
            ->save(storage_path('app/public/pdf/') . $filename, true);

        Report::create([
            'type' => 0,
            'reporttype' => 'bill',
            'to' => $request->name,
            'from' => 'none',
            'file' => $filename,
        ]);

        return response()->file(storage_path('app/public/pdf/') . $filename);
    }

    /**
     * Display a listing of cash reports.
     *
     * @return \Illuminate\Http\Response
     */
    public function cashReport()
    {
        $filterBox = Report::showCustomFilter(filterFiled: [
            [
                'lable' => 'Fully Paid',
                'orderType' => Sorting::EQULE,
                'value' => CashReport::FULLY_PAID->value,
                'name' => 'type',
            ],
            [
                'lable' => 'Partially Paid',
                'orderType' => Sorting::EQULE,
                'value' => CashReport::PARTILY_PAYED->value,
                'name' => 'type',
            ],
            [
                'lable' => 'Not Paid',
                'orderType' => Sorting::EQULE,
                'value' => CashReport::NOT_PAYED->value,
                'name' => 'type',
            ],
        ]);

        $orderReport = Report::Filter()
            ->where('reporttype', ReportType::CASH->value)
            ->RequestPaginate(10);

        return response()->json(['reports' => $orderReport, 'filter' => $filterBox]);
    }
}