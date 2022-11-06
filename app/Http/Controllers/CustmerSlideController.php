<?php

namespace App\Http\Controllers;

use App\Models\CustmerSlide;
use Illuminate\Http\Request;

class CustmerSlideController extends Controller
{


    public $rule = [
       // "img" => "required|string|max:255|min:3",
       //'file' => ['required','mimes:pdf,docx','max:2048'],
       'img' => 'required|max:2048|mimes:jpg,jpeg,png',
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
            
            'url.required' => 'يجب كتابة الرابط ',
            'url.string' => 'يجب ان يكون الرابط نص فقط',
            "url.max" => "يجب ان لا يزيد عنوان الرابط  25 حرف",
            "url.min" => "يجب ان لا يقل عنوان الرابط  3 حرف",


            'img.max' => 'اقصى حجم للصورة يجب تن الا يتعدى 24م ب',
            "img.mimes" => "jpg,jpeg,png يجب ان تكون الصورة من نوع ",
        ];
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CustmerSlide = CustmerSlide::latest()->paginate(10);

        return view("admin.setting.CustmerSlide.index",  ['CustmerSlide' => $CustmerSlide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.setting.CustmerSlide.add" );

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
        
        $data['img'] =  $request->file('img')->store('Slide','public');

        CustmerSlide::create($data);

        return redirect('/admin/CustmerSlide')->with('messages','تم إضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustmerSlide  $custmerSlide
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $slide = CustmerSlide::find($id);
        return view("admin.setting.CustmerSlide.edit",  ['slide' => $slide] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustmerSlide  $custmerSlide
     * @return \Illuminate\Http\Response
     */
    public function edit(CustmerSlide $custmerSlide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustmerSlide  $custmerSlide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data = $request->validate( $this->rule,$this->messages());

        $slide = CustmerSlide::find($id);

        $slide->img = $request->file('img')->store('Slide','public');

        $slide->url=$request->url;

        $slide->save();

        return redirect('/admin/CustmerSlide/')->with('messages','تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustmerSlide  $custmerSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $slide = CustmerSlide::find($id);
        $slide->delete();
        return redirect('/admin/CustmerSlide/')->with('messages','تم حذف العنصر');
    }
}
