<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public $rule = [
        "title" => "required|string|max:255|min:3",
       // "img" => "required|string|max:255|min:3",
       //'file' => ['required','mimes:pdf,docx','max:2048'],
       'img' => 'required|max:2048|mimes:jpg,jpeg,png',
        "des" => "required|string|max:255|min:3",
        "url" => "required|string|max:255|min:3",
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

            'url.required' => 'يجب كتابة الرابط ',
            'url.string' => 'يجب ان يكون الرابط نص فقط',
            "url.max" => "يجب ان لا يزيد عنوان الرابط  25 حرف",
            "url.min" => "يجب ان لا يقل عنوان الرابط  3 حرف",


            'img.required' => 'يجب كتابة الصورة ',
            'img.string' => 'يجب ان يكون الصورة نص فقط',
            "img.max" => "يجب ان لا يزيد الصورة النص عن 25 حرف",
            "img.min" => "يجب ان لا يقل الصورة النص عن 3 حرف",

            'des.required' => 'يجب كتابة الوصف ',
            'des.string' => 'يجب ان يكون الوصف نص فقط',
            "des.max" => "يجب ان لا يزيد الوصف النص عن 25 حرف",
            "des.min" => "يجب ان لا يقل الوصف النص عن 3 حرف",


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
        $allslide = slide::latest()->paginate(10);
        // dd( $allcategory);
        //Services
         return view("admin.setting.slide.index",  ['allslide' => $allslide] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.setting.slide.add" );

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
        
        $data['img'] =  $request->file('img')->store('logo','public');

        slide::create($data);

        return redirect('/admin/Slide')->with('messages','تم إضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = slide::find($id);
        return view("admin.setting.slide.edit",  ['slide' => $slide] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $data = $request->validate( $this->rule,$this->messages());
        $slide = slide::find($id);

        $slide->title=$request->title;
        $slide->des=$request->des;
        $slide->img=$request->img;
        $slide->url=$request->url;

        $slide->save();

        return redirect('/admin/Slide/')->with('messages','تم تعديل العنصر');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = slide::find($id);
        $slide->delete();
        return redirect('/admin/Slide /')->with('messages','تم حذف العنصر');
    }
}
