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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $services = category::get();
        $filterBox = services::showFilter(realData:$services,relType:'category', relName:'التصنيف');
        $allServices = services::Filter()->requestPaginate();
       
        // $filterBox = services::showFilter();
        return view("admin.services.index",  ['allServices' => $allServices, 'filterBox' => $filterBox]);
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

   



        return redirect()->route('admin.Services.index')->with('OkToast', 'تم إضافة البيانات');
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
    public function update(updateSevicesRequest $request,services $Service)
    {


        $Service->name = $request->name;

        $Service->price = $request->price;

        $Service->icon = $request->icon;

        $Service->category_id = $request->category_id;


        $Service->save();

        RequiredFiles::where('type', 0)->where('service_id',  $Service->id)->delete();
 
        if($request['files']){

            foreach ($request['files'] as  $value) {
            if($value){
            RequiredFiles::create([
                'type' => 0,
                "name" => $value,
                "service_id" => $Service->id
            ]);}
        }
        }

        
        //if ($request['pys']) {
            
          //  $Service->payments()->sync(array_unique($request['pys']));
       // }

       // if ($request['dev']) {
        $pys = [];
        if(!empty($request['pys'])) {
            $pys = array_unique($request['pys']);
        }
        
        $dev = [];
        if(!empty($request['dev'])) {
            $dev = array_unique($request['dev']);
        }
        
        $Service->payments()->sync($pys);
        $Service->deliveries()->sync($dev);

           // $Service->deliveries()->sync(array_unique($request['dev']));
       // }

        return redirect()->route('admin.Services.index')->with('OkToast', 'تم تعديل العنصر');
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
        return redirect()->route('admin.Services.index')->with('OkToast', 'تم حذف العنصر');
    }
}
