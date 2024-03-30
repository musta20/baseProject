<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeSevicesRequest;
use App\Http\Requests\updateSevicesRequest;
use App\Models\category;
use App\Models\delivery;
use App\Models\payment;
use App\Models\RequiredFiles;
use App\Models\services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{


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
            "price.digits_between" => "يجب ان لا يزيد السعر  عن 255 حرف",

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

        $allServices = services::Filter()->paginate(10);
       
        // $filterBox = services::showFilter();
        return view("admin.services.index",  ['allServices' => $allServices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = category::get();

        $pay = payment::get();

        $dev = delivery::get();

        return view("admin.services.add", ["cat" => $cat, "dev" => $dev, "pym" => $pay]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeSevicesRequest $request)
    {
       // $data = $request->validate($this->rule, $this->messages());

        
        
        $services = services::create([
            "name" => $request["name"],
            "price" => $request["price"],
            "icon" => $request["icon"],
            "category_id" => $request["category_id"],
        ]);

        if($request['files']){
                foreach ($request['files'] as  $value) {
                RequiredFiles::create([
                    'type' => 0,
                    "name" => $value,
                    "service_id" => $services->id
                ]);
            }
        }


        $services->payments()->sync($request['pys']);

       $services->deliveries()->sync($request['devs']);

   



        return redirect()->route('admin.services.index')->with('messages', 'تم إضافة البيانات');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(services $services)
    {
       // $services = services::find($id);
    //    / dd($services );
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(services $Service)
    {

        $cat = category::get();
        $filesInput = RequiredFiles::where('type', 0)->where('service_id', $Service->id)->get();
        $dev = delivery::get();
        $pym = payment::get();


        return view("admin.services.newedit",  [
            'pym'=>$pym,
            'dev'=>$dev,
            'services' => $Service, 
            "cat" => $cat, 
            'filesInput' => $filesInput]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(updateSevicesRequest $request,services $services)
    {

        $services->name = $request->name;

        $services->price = $request->price;

        $services->icon = $request->icon;

        $services->category_id = $request->category_id;

        $services->save();


        RequiredFiles::where('type', 0)->where('service_id',  $services->id)->delete();
 
        if($request['files']){

            foreach ($request['files'] as  $value) {
            
            RequiredFiles::create([
                'type' => 0,
                "name" => $value,
                "service_id" => $services->id
            ]);
        }
        }
        
        $services->payments()->sync($request['pys']);

        $services->deliveries()->sync($request['devs']);

        return redirect()->route('admin.Services.index')->with('messages', 'تم تعديل العنصر');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(services $services )
    {
        $services->delete();
        return redirect()->route('admin.Services.index')->with('messages', 'تم حذف العنصر');
    }
}
