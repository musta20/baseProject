<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeJobCityRequest;
use App\Http\Requests\updateJobCityRequest;
use App\Models\job_city;
use Illuminate\Http\Request;

class JobCityController extends Controller
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
        $jobcity = job_city::latest()->paginate(10);

        return view("admin.jobs.city.index",  ['jobcity' => $jobcity] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.jobs.city.add" );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeJobCityRequest $request)
    {
        
    job_city::create($request);
   
    return redirect('/admin/JobCity')->with('messages','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job_city  $job_city
     * @return \Illuminate\Http\Response
     */
    public function show(job_city $job_city)
    {
        return view("admin.jobs.city.edit",  ['jobcity' => $job_city] );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job_city  $job_city
     * @return \Illuminate\Http\Response
     */
    public function update(updateJobCityRequest $request, job_city $job_city)
    {

        $job_city->name=$request->name;

        $job_city->save();

        return redirect('/admin/JobCity/')->with('messages','تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job_city  $job_city
     * @return \Illuminate\Http\Response
     */
    public function destroy(job_city $job_city)
    {
        $job_city->delete();
        return redirect('/admin/JobCity/')->with('messages','تم حذف العنصر');
    }
}
