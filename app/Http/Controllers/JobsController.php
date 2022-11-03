<?php

namespace App\Http\Controllers;

use App\Models\job_city;
use App\Models\jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{


    public $rule = [
        "title" => "required|string|max:100|min:3",
        "des" => "required|string|max:255|min:3",
        "city_id" =>"required|integer|digits_between:1,500",
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'title.required' => 'يجب كتابة العنوان ',
            'title.string' => 'يجب ان يكون العنوان نص فقط',
            "title.max" => "يجب ان لا يزيد عنوان النص عن 25 حرف",
            "title.min" => "يجب ان لا يقل عنوان النص عن 3 حرف",

            'des.required' => 'يجب كتابة الوصف ',
            'des.string' => 'يجب ان يكون الوصف نص فقط',
            "des.max" => "يجب ان لا يزيد الوصف  عن 255 حرف",
            "des.min" => "يجب ان لا يقل عنوان النص عن 3 حرف",

            'city_id.required' => 'يجب إضافة  ايقونة ',
            'city_id.string' => 'يجب ان يكون الايقونة نص فقط',
            "city_id.max" => "يجب ان لا يزيد  الايقونة عن 255 حرف",
            "city_id.min" => "يجب ان لا يقل الايقونة النص عن 3 حرف",


        ];
    }


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
    public function store(Request $request)
    {
       // dd($request);

    $data = $request->validate( $this->rule,$this->messages());
    jobs::create($data);
   
    return redirect('/admin/Jobs')->with('messages','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $jobCity = job_city::get();
        $jobs = jobs::find($id);
        $currentcity = job_city::find($jobs->city_id);

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
    public function update(Request $request,$id)
    {
        

        $data = $request->validate( $this->rule,$this->messages());
        $jobs = jobs::find($id);

        $jobs->title=$request->title;
        $jobs->des=$request->des;
        $jobs->city_id=$request->city_id;

        $jobs->save();

        return redirect('/admin/Jobs/')->with('messages','تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobs = jobs::find($id);
        $jobs->delete();
        return redirect('/admin/Jobs/')->with('messages','تم حذف العنصر');

    }
}
