<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    public $rule = [
        "title" => "required|string|max:100|min:3",
        "des" => "required|string|max:255|min:3",
        "map" => "required|string|max:255|min:3",
        "keyword" => "required|string|max:255|min:3",
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
            
            'map.required' => 'يجب  رابط الخريطة ',
            'map.string' => 'يجب ان يكون الخريطة نص فقط',
            "map.max" => "يجب ان لا يزيد الخريطة  عن 255 حرف",
            "map.min" => "يجب ان لا يقل  الخريطة عن 3 حرف",
    
            'keyword.required' => 'يجب كتابة الكلمات الخريطة ',
            'keyword.string' => 'يجب ان يكون الكلمات نص فقط',
            "keyword.max" => "يجب ان لا يزيد الكلمات  عن 255 حرف",
            "keyword.min" => "يجب ان لا يقل  الكلمات عن 3 حرف",
            

        ];
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //,  ['allServices' => $allServices]
        return view("admin.setting.main");

    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting(Request $request)
    {
        //dd($request);
        $setting = setting::first();
        //,  ['allServices' => $allServices]

      //  dd($setting );

        return view("admin.setting.index",["setting"=>$setting ]);

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
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate($this->rule,$this->messages());

        $setting= setting::find($id);

        $setting->title = $request->title;
        $setting->des = $request->des;
        $setting->map = $request->map;
        $setting->keyword = $request->keyword;

        $setting->phone = $request->keyword;
        $setting->adress = $request->keyword;
        $setting->email = $request->keyword;

        $setting->footer = $request->keyword;

        $setting->footertext = $request->keyword;

        $setting->Save();


        return redirect('/admin/basic');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
