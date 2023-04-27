<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $data = Website::first();
        return view('admin.setting',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $setting = Website::first();

        if($request->hasFile('logo')){

            $oldfile = public_path().'/dashboard/img/'.$setting->logo;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('logo');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/dashboard/img/',$name);
            $setting->logo=$name;

        }

        $setting->name = $request->name;
        $setting->email_1 = $request->email_1;
        $setting->email_2 = $request->email_2;
        $setting->phone_1 = $request->phone_1;
        $setting->phone_2 = $request->phone_2;
        $setting->address_line_1 = $request->address_line_1;
        $setting->address_line_2 = $request->address_line_2;
        $setting->establish_at = $request->establish_at;
        $setting->fb_url = $request->fb_url;
        $setting->twitter_url = $request->twitter_url;
        $setting->instagram_url = $request->instagram_url;
        $setting->youtube_url = $request->youtube_url;
        $setting->map_url = $request->map_url;
        $setting->playstore_url = $request->playstore_url;
        $setting->appstore_url = $request->appstore_url;
        $setting->save();

        return back()->with('message','Changes saved successfully .');
    }

}
