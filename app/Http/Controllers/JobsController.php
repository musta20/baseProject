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
        $filterBox=jobs::showFilter();

        $alljobs = jobs::latest()->requestPaginate();
        
        return view("admin.jobs.index",  [
        'alljobs' => $alljobs
        ,'filterBox'=>$filterBox

        ] );

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
        return view("admin.jobs.add",['jobCity'=>$jobCity
    
    ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeJobRequest $request)
    {

    jobs::create([
        "title"=>$request->title,
        "des"=>$request->des,
        "job_cities_id"=>$request->job_cities_id,
    ]);
   
    return redirect()->route('admin.Jobs.index')->with('OkToast','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(jobs $Job)
    {
        $jobCity = job_city::get();
        $currentcity = job_city::find($Job->job_cities_id);

        return view("admin.jobs.edit",  ['Jobs' => $Job,"currentcity"=>$currentcity,"jobCity"=>$jobCity] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(jobs $Job)
    {
        $jobCity = job_city::get();
     
        
        return view("admin.jobs.edit",  ['Jobs' => $Job,"jobCity"=>$jobCity] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(updateJobRequest $request,jobs $Job)
    {

        $Job->title=$request->title;
        $Job->des=$request->des;
        $Job->job_cities_id=$request->job_cities_id;

        $Job->save();

        return redirect()->route('admin.Jobs.index')->with('OkToast','تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(jobs $Job)
    {
        $Job->delete();
        return redirect()->route('admin.Jobs.index')->with('OkToast','تم حذف العنصر');

    }
}
