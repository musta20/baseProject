<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeSocialRequest;
use App\Models\social;

class SocialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsocial = social::latest()->paginate(10);
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
    public function store(storeSocialRequest $request)
    {


        social::create([
            'img' => $request->img,
            'url' => $request->url
        ]);
       
        return redirect('/admin/Social')->with('OkToast','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(social $social)
    {
        return view("admin.setting.social.edit",  ['social' => $social] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(social $Social)
    {
        //
        return view("admin.setting.social.edit",  ['social' => $Social] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(storeSocialRequest $request,social $Social)
    {
    


        $Social->img=$request->img;
        $Social->url=$request->url;

        $Social->save();

        return redirect()->route('admin.Social.index')->with('OkToast','تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(social $Social)
    {
        $Social->delete();
        return redirect()->route('admin.Social.index')->with('OkToast','تم حذف العنصر');
    }
}
