<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jobapp;
use App\Models\Jobs;
use Illuminate\Http\JsonResponse;

class JobAppApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $jobs = Jobs::all();
        $filterBox = Jobapp::showFilter(realData: $jobs, relType: 'jobs', relName: 'الوظيفة');
        $allJobApps = Jobapp::Filter()->with('job')->requestPaginate();

        return response()->json([
            'jobApplications' => $allJobApps,
            'filterBox' => $filterBox,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobapp $jobApp): JsonResponse
    {
        return response()->json($jobApp->load('job'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobapp $jobApp): JsonResponse
    {
        $jobApp->delete();

        return response()->json([
            'message' => 'Job application deleted successfully',
        ]);
    }
}
