<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSevicesRequest;
use App\Http\Requests\updateSevicesRequest;
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
    public function show(Services $service)
    {
        return response()->json(['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(updateSevicesRequest $request, Services $service)
    {
        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'icon' => $request->icon,
            'category_id' => $request->category_id,
        ]);

        RequiredFiles::where('type', 0)->where('service_id', $service->id)->delete();

        if ($request['files']) {
            foreach ($request['files'] as $value) {
                if ($value) {
                    RequiredFiles::create([
                        'type' => 0,
                        'name' => $value,
                        'service_id' => $service->id,
                    ]);
                }
            }
        }

        $pys = [];
        if (! empty($request['pys'])) {
            $pys = array_unique($request['pys']);
        }

        $dev = [];
        if (! empty($request['dev'])) {
            $dev = array_unique($request['dev']);
        }

        $service->payments()->sync($pys);
        $service->deliveries()->sync($dev);

        return response()->json(['message' => 'Service updated successfully.', 'service' => $service]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully.']);
    }
}
