<?php

namespace App\Http\Controllers;

use App\Models\Jobapp;
use App\Models\Jobs;
use Illuminate\Http\Request;

class JobAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = jobs::get();
        $filterBox = Jobapp::showFilter(realData: $jobs, relType: 'jobs', relName: 'الوظيفة');
        $alljopapp = Jobapp::Filter()->with('job')->requestPaginate();

        return view('admin.jobs.jobApp.index', ['alljopapp' => $alljopapp, 'filterBox' => $filterBox]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobapp  $Jobapp
     * @return \Illuminate\Http\Response
     */
    public function show(Jobapp $JobApp)
    {
        return view('admin.jobs.jobApp.show', ['job' => $JobApp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobapp $Jobapp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobapp $Jobapp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobapp $Jobapp)
    {
        $Jobapp->delete();

        return redirect('/admin/JobApp')->with('OkToast', 'تم حذف العنصر');
    }
}
