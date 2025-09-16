<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Requests\Admin\SettingRequest;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();

        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\SettingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $validated = $request->validated();

        if($request->hasfile('image')){
            if($setting->about_photo != null){
                Storage::delete($setting->about_photo);
            }
            $get_new_file = $request->file('image')->store('images');
            $setting->about_photo = $get_new_file;
        }
        
        $setting->update($validated);
        return to_route('admin.setting.index')->with('message','Data Updated');
    }
}
