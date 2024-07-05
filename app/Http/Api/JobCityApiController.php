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
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $jobCities = Jobcity::latest()->paginate(10);
        return response()->json($jobCities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJobCityRequest $request
     * @return JsonResponse
     */
    public function store(StoreJobCityRequest $request): JsonResponse
    {
        $jobCity = Jobcity::create($request->validated());

        return response()->json([
            'message' => 'Job city created successfully',
            'jobCity' => $jobCity
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Jobcity $jobCity
     * @return JsonResponse
     */
    public function show(Jobcity $jobCity): JsonResponse
    {
        return response()->json($jobCity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateJobCityRequest $request
     * @param Jobcity $jobCity
     * @return JsonResponse
     */
    public function update(UpdateJobCityRequest $request, Jobcity $jobCity): JsonResponse
    {
        $jobCity->update($request->validated());

        return response()->json([
            'message' => 'Job city updated successfully',
            'jobCity' => $jobCity
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Jobcity $jobCity
     * @return JsonResponse
     */
    public function destroy(Jobcity $jobCity): JsonResponse
    {
        $jobCity->delete();

        return response()->json([
            'message' => 'Job city deleted successfully'
        ]);
    }
}