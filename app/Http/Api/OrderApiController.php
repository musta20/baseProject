<?php

namespace App\Http\Controllers\API;

use App\Enums\OrderStatus as EnumsOrderStatus;
use App\Enums\PayStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Files;
use App\Models\Order;
use App\Models\Services;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class OrderApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $allOrder = Order::latest()->paginate(10);

        return response()->json($allOrder);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): JsonResponse
    {
        return response()->json($order->load('servicesNmae', 'delivery', 'payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): JsonResponse
    {
        $order->price = $order->count * $order->servicesNmae->price;
        $order->ServiceName = $order->servicesNmae->name;
        $order->still = $order->price - $order->payed;

        $files = Files::where('type', 1)->where('typeid', $order->id)->get();

        $statusMap = [
            0 => 'قيد الانتظار',
            1 => 'جاري العمل عليه',
            2 => 'جاهز للتسليم',
            3 => ' تم تسليمه',
            4 => ' ملغي',
        ];

        $order->status_order = $statusMap[$order->status] ?? '';

        $statusOrder = EnumsOrderStatus::cases();
        $PayStatus = PayStatus::cases();

        return response()->json([
            'order' => $order,
            'files' => $files,
            'statusOrder' => $statusOrder,
            'PayStatus' => $PayStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order): JsonResponse
    {
        if ($request->has('time')) {
            $order->time = $request->time;
        }

        if ($request->has('cost')) {
            $order->payed += $request->cost;
        }

        $statusChanged = $order->status != $request->status;

        $order->status = $request->status;

        if ($request->status == 1) {
            $order->approve_time = now();
        }

        $order->save();

        if ($statusChanged) {
            // Implement status change notification logic here
            // For example: event(new OrderStatusChanged($order));
        }

        return response()->json([
            'message' => 'Order updated successfully',
            'order' => $order,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): JsonResponse
    {
        $order->status = EnumsOrderStatus::CANCLED_ORDER->value;
        $order->save();

        return response()->json(['message' => 'Order cancelled successfully']);
    }

    /**
     * Display a listing of the resource by status.
     */
    public function showOrderList(int $type): JsonResponse
    {
        $services = Services::all();

        $allOrder = Order::where('status', $type)->Filter();

        $titleMap = [
            EnumsOrderStatus::NEW_ORDER->value => 'الطلبات الجديدة',
            EnumsOrderStatus::ORDER_RECEIVED->value => 'الطلبات  المسلتلمة',
            EnumsOrderStatus::COMPLETED_ORDER->value => 'الطلبات المكتملة',
            EnumsOrderStatus::DELIVERED_ORDER->value => 'الطلبات المسلمة',
            EnumsOrderStatus::CANCLED_ORDER->value => 'الطلبات الملغية',
        ];

        $title = $titleMap[$type] ?? null;

        if (! $title) {
            return response()->json(['error' => 'Invalid order status'], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'orders' => $allOrder,
            'type' => $type,
            'title' => $title,
        ]);
    }
}
