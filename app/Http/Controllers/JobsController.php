<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeJobRequest;
use App\Http\Requests\updateJobRequest;
use App\Models\job_city;
use App\Models\jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{



    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alljobs = jobs::latest()->paginate(10);
        
        return view("admin.jobs.index",  ['alljobs' => $alljobs] );

    }

    public function main()
    {
        return view("admin.jobs.main");
    }






    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobCity = job_city::get();

        return view("admin.jobs.add",['jobCity'=>$jobCity]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeJobRequest $request)
    {

    jobs::create($request);
   
    return redirect()->route('admin.Jobs.index')->with('messages','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(jobs $jobs)
    {
        $jobCity = job_city::get();
        $currentcity = job_city::find($jobs->job_cities_id);

        return view("admin.jobs.edit",  ['jobs' => $jobs,"currentcity"=>$currentcity,"jobCity"=>$jobCity] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(jobs $jobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(updateJobRequest $request,jobs $jobs)
    {
        
        $jobs->title=$request->title;
        $jobs->des=$request->des;
        $jobs->job_cities_id=$request->job_cities_id;

        $jobs->save();

        return redirect()->route('admin.Jobs.index')->with('messages','تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(jobs $jobs)
    {
        $jobs->delete();
        return redirect()->route('admin.Jobs.index')->with('messages','تم حذف العنصر');

    }
}
