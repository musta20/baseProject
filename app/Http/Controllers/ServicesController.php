<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\delivery;
use App\Models\dev_to_serv;
use App\Models\payment;
use App\Models\pym_to_serv;
use App\Models\RequiredFiles;
use App\Models\services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{


    public $rule = [
        "name" => "required|string|max:100|min:3",
        "price" => "required|integer|digits_between:1,10",
        "icon" => "required|string|max:255|min:3",
        "cat_id" => "required|integer|digits_between:1,10"
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
        //
        //Services
        $allServices = services::paginate(10);
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

        $delv = delivery::get();

        return view("admin.services.add", ["cat" => $cat, "delv" => $delv, "pay" => $pay]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->rule, $this->messages());

        $services = services::create([
            "name" => $data["name"],
            "price" => $data["price"],
            "icon" => $data["icon"],
            "cat_id" => $data["cat_id"],
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
        //pys

        if($request['pys']){
            foreach ($request['pys'] as  $value) {
                pym_to_serv::create([
                "pym_id" => $value,
                "serv_id" => $services->id
            ]);
        }
        }

        if($request['devs']){
            foreach ($request['devs'] as  $value) {
                dev_to_serv::create([
                "dev_id" => $value,
                "serv_id" => $services->id
            ]);
        }
        }



        return redirect('/admin/Services')->with('messages', 'تم إضافة البيانات');
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
        $catmy = category::find($services->cat_id);
        $filesInput = RequiredFiles::where('type', 0)->where('service_id', $services->id)->get();

        $dev = delivery::get();
        $pym = payment::get();

        $pay = pym_to_serv::where('serv_id',$services->id)->with('pym')->get();

        $delv = dev_to_serv::where('serv_id',$services->id)->with('dev')->get();
        

        return view("admin.services.edit",  ['pym'=>$pym,'dev'=>$dev,'delv'=>$delv,'pay'=>$pay,'catmy' => $catmy, 'services' => $services, "cat" => $cat, 'filesInput' => $filesInput]);
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
    public function update(Request $request, $id)
    {

        $data = $request->validate($this->rule, $this->messages());

        $services = services::find($id);

        $services->name = $request->name;
        $services->price = $request->price;
        $services->icon = $request->icon;

        $services->cat_id = $request->cat_id;

        $services->save();



        RequiredFiles::where('type', 0)->where('service_id',  $services->id)->delete();
        dev_to_serv::where('serv_id',  $services->id)->delete();
        pym_to_serv::where('serv_id',  $services->id)->delete();


/*         $i = 0;
        while (isset($request["files-" . $i])) {
            RequiredFiles::create([
                'type' => 0,
                "name" => $request["files-" . $i],
                "service_id" => $services->id
            ]);
            $i = $i + 1;
        } */


        if($request['files']){

            foreach ($request['files'] as  $value) {
            
            RequiredFiles::create([
                'type' => 0,
                "name" => $value,
                "service_id" => $services->id
            ]);
        }
        }
        //pys

        if($request['pys']){
            foreach ($request['pys'] as  $value) {
                pym_to_serv::create([
                "pym_id" => $value,
                "serv_id" => $services->id
            ]);
        }
        }

        if($request['devs']){
            foreach ($request['devs'] as  $value) {
                dev_to_serv::create([
                "dev_id" => $value,
                "serv_id" => $services->id
            ]);
        }
        }








        return redirect('/admin/Services/')->with('messages', 'تم تعديل العنصر');
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
        return redirect('/admin/Services/')->with('messages', 'تم حذف العنصر');
    }
}
