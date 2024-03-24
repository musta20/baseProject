<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCustmerSlideRequest;
use App\Http\Requests\updateCustmerSlideRequest;
use App\Models\CustmerSlide;

class CustmerSlideController extends Controller
{


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
    public function store(storeCustmerSlideRequest $request)
    {
        
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
    public function show(CustmerSlide $slide)
    {
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
    public function update(updateCustmerSlideRequest $request,CustmerSlide $slide)
    {

        $slide->img = $request->file('img')->store('Slide','public');

        $slide->url=$request->url;

        $slide->save();

        return redirect()->route('admin.CustmerSlide.index')->with('messages','تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustmerSlide  $custmerSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustmerSlide $slide)
    {
        $slide->delete();
        return redirect()->route('admin.CustmerSlide.index')->with('messages','تم حذف العنصر');
    }
}
