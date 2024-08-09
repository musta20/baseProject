<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSevicesRequest;
use App\Http\Requests\UpdateSevicesRequest;
use App\Models\RequiredFiles;
use App\Models\Services;

class ServicesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allServices = Services::Filter();

        return response()->json(['services' => $allServices]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSevicesRequest $request)
    {
        $service = Services::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'icon' => $request['icon'],
            'category_id' => $request['category_id'],
        ]);

        if ($request['files']) {
            foreach ($request['files'] as $value) {
                RequiredFiles::create([
                    'type' => 0,
                    'name' => $value,
                    'service_id' => $service->id,
                ]);
            }
        }

        $service->payments()->sync($request['pys']);
        $service->deliveries()->sync($request['devs']);

        return response()->json(['message' => 'Service created successfully.', 'service' => $service], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $Service)
    {
        return response()->json(['service' => $Service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSevicesRequest $request, Services $Service)
    {
        $Service->update([
            'name' => $request->name,
            'price' => $request->price,
            'icon' => $request->icon,
            'category_id' => $request->category_id,
        ]);


        if ($request['files']) {

            RequiredFiles::where('type', 0)->where('service_id', $Service->id)->delete();

            foreach ($request['files'] as $value) {
                if ($value) {
                    RequiredFiles::create([
                        'type' => 0,
                        'name' => $value,
                        'service_id' => $Service->id,
                    ]);
                }
            }
        }

        $pys = [];
        if (! empty($request['pys'])) {
            $pys = array_unique($request['pys']);

            $Service->payments()->sync($pys);

        }

        $dev = [];
        if (! empty($request['dev'])) {
            $dev = array_unique($request['dev']);

            $Service->deliveries()->sync($dev);

        }


        return response()->json(['message' => 'Service updated successfully.', 'service' => $Service]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $Service)
    {
        $Service->delete();

        return response()->json(['message' => 'Service deleted successfully.']);
    }
}
