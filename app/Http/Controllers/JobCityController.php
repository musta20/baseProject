<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeJobCityRequest;
use App\Http\Requests\updateJobCityRequest;
use App\Models\Jobcity;

class JobCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobcity = Jobcity::latest()->paginate(10);

        return view('admin.jobs.city.index', ['jobcity' => $jobcity]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobs.city.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeJobCityRequest $request)
    {

        Jobcity::create($request);

        return redirect('/admin/JobCity')->with('OkToast', 'تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Jobcity $Jobcity)
    {
        return view('admin.jobs.city.edit', ['jobcity' => $Jobcity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(updateJobCityRequest $request, Jobcity $Jobcity)
    {

        $Jobcity->name = $request->name;

        $Jobcity->save();

        return redirect('/admin/JobCity/')->with('OkToast', 'تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobcity $Jobcity)
    {
        $Jobcity->delete();

        return redirect('/admin/JobCity/')->with('OkToast', 'تم حذف العنصر');
    }
}
