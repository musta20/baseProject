<?php

namespace App\Http\Controllers;

use App\Models\job_app;
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
        $alljopapp = job_app::latest()->paginate(10);

        return view("admin.jobs.jobApp.index",  ['alljopapp' => $alljopapp]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job_app  $job_app
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
            $job = job_app::find($id);
    
            return view("admin.jobs.jobApp.show",  ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job_app  $job_app
     * @return \Illuminate\Http\Response
     */
    public function edit(job_app $job_app)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job_app  $job_app
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, job_app $job_app)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job_app  $job_app
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job_app = job_app::find($id);
        $job_app->delete();
        return redirect('/admin/JobApp')->with('messages','تم حذف العنصر');
    }
}
