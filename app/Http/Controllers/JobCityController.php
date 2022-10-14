<?php

namespace App\Http\Controllers;

use App\Models\job_city;
use Illuminate\Http\Request;

class JobCityController extends Controller
{



    public $rule = [
        "name" => "required|string|max:100|min:3",

    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'name.required' => 'يجب كتابة العنوان ',
            'name.string' => 'يجب ان يكون العنوان نص فقط',
            "name.max" => "يجب ان لا يزيد عنوان النص عن 25 حرف",
            "name.min" => "يجب ان لا يقل عنوان النص عن 3 حرف",



        ];
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobcity = job_city::latest()->get();

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
    public function store(Request $request)
    {
        
    $data = $request->validate( $this->rule,$this->messages());

    job_city::create($data);
   
    return redirect('/admin/JobCity')->with('messages','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job_city  $job_city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobcity = job_city::find($id);
        return view("admin.jobs.city.edit",  ['jobcity' => $jobcity] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job_city  $job_city
     * @return \Illuminate\Http\Response
     */
    public function edit(job_city $job_city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job_city  $job_city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data = $request->validate( $this->rule,$this->messages());
        $job_city = job_city::find($id);

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
    public function destroy( $id)
    {
        $job_city = job_city::find($id);
        $job_city->delete();
        return redirect('/admin/JobCity/')->with('messages','تم حذف العنصر');
    }
}
