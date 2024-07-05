<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustmerSlideRequest;
use App\Http\Requests\UpdateCustmerSlideRequest;
use App\Models\CustmerSlide;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class CustomerSlideApiController extends Controller
{
    /**
     * Display a paginated listing of the Customer Slide resources.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $customerSlides = CustmerSlide::latest()->paginate(10);
        return response()->json($customerSlides);
    }

    /**
     * Store a newly created Customer Slide in storage.
     *
     * @param StoreCustmerSlideRequest $request
     * @return JsonResponse
     */
    public function store(StoreCustmerSlideRequest $request): JsonResponse
    {
        $data['img'] = $request->file('img')->store('Slide', 'public');
        $customerSlide = CustmerSlide::create($data);

        return response()->json([
            'message' => 'Customer slide created successfully',
            'customerSlide' => $customerSlide
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param CustmerSlide $slide
     * @return JsonResponse
     */
    public function show(CustmerSlide $slide): JsonResponse
    {
        return response()->json($slide);
    }

    /**
     * Update the specified CustomerSlide resource in storage.
     *
     * @param UpdateCustmerSlideRequest $request
     * @param CustmerSlide $slide
     * @return JsonResponse
     */
    public function update(UpdateCustmerSlideRequest $request, CustmerSlide $slide): JsonResponse
    {
        // Delete the old image if a new one is uploaded
        if ($request->hasFile('img')) {
            Storage::disk('public')->delete($slide->img);
            $data['img'] = $request->file('img')->store('Slide', 'public');
        }

        $data['url'] = $request->url;
        $slide->update($data);

        return response()->json([
            'message' => 'Customer slide updated successfully',
            'customerSlide' => $slide
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CustmerSlide $slide
     * @return JsonResponse
     */
    public function destroy(CustmerSlide $slide): JsonResponse
    {
        // Delete the associated image file
        Storage::disk('public')->delete($slide->img);

        if ($slide->delete()) {
            return response()->json([
                'message' => 'Customer slide deleted successfully'
            ]);
        }

        return response()->json([
            'message' => 'Error occurred while deleting the customer slide'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}