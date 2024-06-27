<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus as EnumsOrderStatus;
use App\Enums\PayStatus;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Files;
use App\Models\Order;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allorder = order::latest()->paginate(10);

        return view('admin.order.main', ['allorder' => $allorder]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $Order)
    {
        //$order = order::with('servicesNmae')->with('delivery')->with('payment')->find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $Order)
    {
        $Order->price = $Order->count * $Order->servicesNmae->price;

        $Order->ServiceName = $Order->servicesNmae->name; //still

        $Order->still = $Order->price - $Order->payed;   //still

        $files = Files::where('type', 1)->where('typeid', $Order->id)->get();

        switch ($Order->status) {
            case 0:
                $Order->status_order = 'قيد الانتظار';
                break;
            case 1:
                $Order->status_order = 'جاري العمل عليه';
                break;
            case 2:
                $Order->status_order = 'جاهز للتسليم';
                break;
            case 3:
                $Order->status_order = ' تم تسليمه';
                break;
            case 4:
                $Order->status_order = ' ملغي';
                break;
            default:
                break;
        }

        $statusOrder = EnumsOrderStatus::cases();
        $PayStatus = PayStatus::cases();

        return view('admin.order.edit', [
            'statusOrder' => $statusOrder,
            'PayStatus' => $PayStatus,
            'order' => $Order, 'files' => $files]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, order $Order)
    {

        if ($request->time) {
            $Order->time = $request->time;
        }

        if ($request->cost) {
            $Order->payed = $Order->payed + $request->cost;
        }

        $send = false;

        if ($Order->status != $request->status) {
            $send = true;
        }

        $Order->status = $request->status;

        if ($request->status == 1) {
            $Order->approve_time = date('d-m-y h:i:s');
        }

        $Order->save();

        if ($send) {
            // Mail::to($order->email)->send(new OrderStatus(($order)));
        }

        return redirect()->route('admin.showOrderList', $Order->status)->with('OkToast', 'تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $Order)
    {
        $Order->status = 4;
        $Order->save();

        return Redirect::back()->with('OkToast', 'تم حذف العنصر');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrderList($type)
    {
        $services = services::all();
        // $filterBox = order::showFilter(realData:$services,relType:'services', relName:'الخدمة');

        $AllOrder = order::where('status', $type)->Filter(); //->RequestPaginate();

        switch ($type) {
            case EnumsOrderStatus::NEW_ORDER->value:
                $title = 'الطلبات الجديدة';
                break;
            case EnumsOrderStatus::ORDER_RECEIVED->value:
                $title = 'الطلبات  المسلتلمة';
                break;
            case EnumsOrderStatus::COMPLETED_ORDER->value:
                $title = 'الطلبات المكتملة';
                break;
            case EnumsOrderStatus::DELIVERED_ORDER->value:
                $title = 'الطلبات المسلمة';
                break;
            case EnumsOrderStatus::CANCLED_ORDER->value:
                $title = 'الطلبات الملغية';
                break;
            default:
                abort(Response::HTTP_NOT_FOUND);
                break;
        }

        return view('admin.order.index', ['AllOrder' => $AllOrder, 'type' => $type, 'title' => $title]);
    }
}
