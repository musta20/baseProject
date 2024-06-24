<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //,  ['allServices' => $allServices]
        return view('admin.setting.main');

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
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $setting = setting::find($id);

        $setting->title = $request->title;
        $setting->des = $request->des;
        $setting->map = $request->map;
        $setting->keyword = $request->keyword;

        $setting->phone = $request->phone;
        $setting->adress = $request->adress;
        $setting->email = $request->email;

        $setting->footer = $request->footer;

        $setting->footertext = $request->footertext;
        $setting->billterm = $request->billterm;

        $setting->copyright = $request->copyright;
        $setting->weekwork = $request->weekwork;

        if ($request->hasFile('logo')) {

            $request->validate([
                'logo' => 'required|file|image|mimes:ico,png,svg|max:2048',
            ]);

            $file_extension = $request->file('logo')->getClientOriginalExtension();
            $setting->logo = $request->file('logo')->storeAs('logo', 'logo.' . $file_extension);

            // $setting->logo =  $request->file('logo')->storeAs('logo', 'logo.png');
        }
        $setting->save();

        return redirect()->route('admin.basic')->with('OkToast', 'تم تعديل البيانات');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting(Request $request)
    {
        $setting = setting::first();

        return view('admin.setting.index', ['setting' => $setting]);

    }
}
