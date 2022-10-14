<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    

    public $rule = [
        "name" => "required|string|max:100|min:3",
        "price" => "required|integer|digits_between:1,10",
        "icon" => "required|string|max:255|min:3",
        "cat_id" =>"required|integer|digits_between:1,10"
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

            'price.required' => 'يجب كتابة السعر ',
            'price.integer' => 'يجب ان يكون السعر  رقم',
            "price.max" => "يجب ان لا يزيد السعر  عن 255 حرف",
            "price.min" => "يجب ان لا يقل  السعر عن 3 حرف",

            'icon.required' => 'يجب إضافة  ايقونة ',
            'icon.string' => 'يجب ان يكون الايقونة نص فقط',
            "icon.max" => "يجب ان لا يزيد  الايقونة عن 255 حرف",
            "icon.min" => "يجب ان لا يقل الايقونة النص عن 3 حرف",


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
               //Services
               $allServices = services::paginate(10);
               return view("admin.services.index",  ['allServices' => $allServices] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = category::get();

        return view("admin.services.add",["cat"=>$cat]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request
        $data = $request->validate( $this->rule,$this->messages());

        services::create($data);
       
        return redirect('/admin/Services/create')->with('messages','تم إضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = services::find($id);
        $cat = category::get();
        return view("admin.services.edit",  ['services' => $services,"cat"=>$cat] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(services $services)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
                
        $data = $request->validate( $this->rule,$this->messages());
        
        $services = services::find($id);

        $services->name=$request->name;
        $services->price=$request->price;
        $services->icon=$request->icon;

        $services->save();

        return redirect('/admin/Services/')->with('messages','تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = services::find($id);
        $services->delete();
        return redirect('/admin/Services/')->with('messages','تم حذف العنصر');
    }
}
