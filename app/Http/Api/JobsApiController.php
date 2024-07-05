<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Jobcity;
use App\Models\Jobs;
use Illuminate\Http\JsonResponse;

class JobsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $filterBox = Jobs::showFilter();
        $allJobs = Jobs::latest()->requestPaginate();

        return response()->json([
            'jobs' => $allJobs,
            'filterBox' => $filterBox,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJobRequest $request
     * @return JsonResponse
     */
    public function store(StoreJobRequest $request): JsonResponse
    {
        $job = Jobs::create([
            'title' => $request->title,
            'des' => $request->des,
            'job_cities_id' => $request->job_cities_id,
        ]);

        return response()->json([
            'message' => 'Job created successfully',
            'job' => $job
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Jobs $job
     * @return JsonResponse
     */
    public function show(Jobs $job): JsonResponse
    {
        $jobCity = Jobcity::find($job->job_cities_id);

        return response()->json([
            'job' => $job,
            'jobCity' => $jobCity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateJobRequest $request
     * @param Jobs $job
     * @return JsonResponse
     */
    public function update(UpdateJobRequest $request, Jobs $job): JsonResponse
    {
        $job->update([
            'title' => $request->title,
            'des' => $request->des,
            'job_cities_id' => $request->job_cities_id,
        ]);

        return response()->json([
            'message' => 'Job updated successfully',
            'job' => $job
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Jobs $job
     * @return JsonResponse
     */
    public function destroy(Jobs $job): JsonResponse
    {
        $job->delete();

        return response()->json([
            'message' => 'Job deleted successfully'
        ]);
    }
}