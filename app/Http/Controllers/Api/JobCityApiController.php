<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobCityRequest;
use App\Http\Requests\UpdateJobCityRequest;
use App\Models\Jobcity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class JobCityApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $jobCities = Jobcity::latest()->paginate(10);

        return response()->json($jobCities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobCityRequest $request): JsonResponse
    {
        $JobCity = Jobcity::create($request->validated());

        return response()->json([
            'message' => 'Job city created successfully',
            'jobCity' => $JobCity,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobcity $JobCity): JsonResponse
    {
        return response()->json($JobCity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobCityRequest $request, Jobcity $JobCity): JsonResponse
    {
        $JobCity->update($request->validated());

        return response()->json([
            'message' => 'Job city updated successfully',
            'jobCity' => $JobCity,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobcity $JobCity): JsonResponse
    {
        $JobCity->delete();

        return response()->json([
            'message' => 'Job city deleted successfully',
        ]);
    }
}
