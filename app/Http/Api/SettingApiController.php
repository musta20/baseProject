<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingApiController extends Controller
{
    /**
     * Display the setting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return response()->json(['setting' => $setting]);
    }

    /**
     * Update the specified setting in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $request->validate([
            'logo' => 'sometimes|image|mimes:ico,png,svg|max:2048', // Adjust validation as needed
        ]);

        $data = $request->except('logo'); 

        if ($request->hasFile('logo')) {
            $file_extension = $request->file('logo')->getClientOriginalExtension();
            $data['logo'] = $request->file('logo')->storeAs('logo', 'logo.' . $file_extension);
        }

        $setting->update($data);

        return response()->json(['message' => 'Setting updated successfully.', 'setting' => $setting]);
    }
}