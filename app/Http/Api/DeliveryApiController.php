<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Models\Delivery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeliveryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $deliveries = Delivery::latest()->paginate(10);
        return response()->json($deliveries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDeliveryRequest $request
     * @return JsonResponse
     */
    public function store(StoreDeliveryRequest $request): JsonResponse
    {
        $delivery = Delivery::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Delivery created successfully',
            'delivery' => $delivery
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Delivery $delivery
     * @return JsonResponse
     */
    public function show(Delivery $delivery): JsonResponse
    {
        return response()->json($delivery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDeliveryRequest $request
     * @param Delivery $delivery
     * @return JsonResponse
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery): JsonResponse
    {
        $delivery->name = $request->name;
        $delivery->save();

        return response()->json([
            'message' => 'Delivery updated successfully',
            'delivery' => $delivery
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Delivery $delivery
     * @return JsonResponse
     */
    public function destroy(Delivery $delivery): JsonResponse
    {
        $delivery->delete();

        return response()->json([
            'message' => 'Delivery deleted successfully'
        ]);
    }
}