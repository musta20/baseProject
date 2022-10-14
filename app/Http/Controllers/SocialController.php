<?php

namespace App\Http\Controllers;

use App\Models\social;
use Illuminate\Http\Request;

class SocialController extends Controller
{


    public $rule = [
        "img" => "required|string|max:255|min:3",
        "url" => "required|string|max:255|min:3"
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'img.required' => 'يجب كتابة العنوان ',
            'img.string' => 'يجب ان يكون العنوان نص فقط',
            "img.max" => "يجب ان لا يزيد عنوان النص عن 25 حرف",
            "img.min" => "يجب ان لا يقل عنوان النص عن 3 حرف",

            'url.required' => 'يجب كتابة الوصف ',
            'url.string' => 'يجب ان يكون الوصف نص فقط',
            "url.max" => "يجب ان لا يزيد الوصف  عن 255 حرف",
            "url.min" => "يجب ان لا يقل عنوان النص عن 3 حرف"


        ];
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsocial = social::latest()->get();
        // dd( $allcategory);
        //Services
         return view("admin.setting.social.index",  ['allsocial' => $allsocial] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.setting.social.add" );

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

        social::create($data);
       
        return redirect('/admin/Social')->with('messages','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $social = social::find($id);
        return view("admin.setting.social.edit",  ['social' => $social] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(social $social)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    


        $data = $request->validate( $this->rule,$this->messages());
        $social = social::find($id);

        $social->img=$request->img;
        $social->url=$request->url;

        $social->save();

        return redirect('/admin/Social/')->with('messages','تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = social::find($id);
        $social->delete();
        return redirect('/admin/Social/')->with('messages','تم حذف العنصر');
    }
}
