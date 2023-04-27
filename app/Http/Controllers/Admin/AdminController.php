<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\UserRequest;
use App\User;
use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends CommonController
{
    public function __construct()
    {

        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.index',$this->data);
    }

    public function editProfile()
    {
        $user = Auth::guard('admin')->user();

        return view('admin.edit_profile',compact('user'));
    }

    public function editProfileSubmit(UserRequest $request)
    {
        $admin = Auth::guard('admin')->user();


        if($request->hasFile('image')){

            $oldfile = public_path().'/dashboard/img/'.$admin->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/dashboard/img/',$name);
            $admin->image=$name;

        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        return back()->with('message','Profile updated successfully .');
    }

    public function changePassword()
    {
        return view('admin.change_password');
    }

    public function changePasswordSubmit(ChangePasswordRequest $request)
    {
        $opass =$request->get('old_password');
        $dbpass = auth()->user()->password;
        if(!Hash::check($opass ,$dbpass)){
            return redirect()->back()->with('error_message','Old Password is wrong');
        }

        $new_password =$request->get('new_password');



        $user = \App\Admin::find(auth()->user()->id);
        $user->password=bcrypt($new_password);
        if($user->save()){
            return redirect()->back()->with('message',' Password Changed Successfully .');
        }

    }

    public function changeCurrency($currency)
    {
        $data = Website::first();
        $data->currency = $currency;
        $data->save();

    }

    public function pointsPerCurrency($pointsPerCurrency)
    {
        $data = Website::first();
        $data->points_per_currency = $pointsPerCurrency;
        $data->save();
    }

    public function pointsForReferrer($points)
    {
        $data = Website::first();
        $data->points_for_referrer = $points;
        $data->save();
    }

    public function pointsForRefercodeUser($points)
    {
        $data = Website::first();
        $data->points_for_refercode_user = $points;
        $data->save();
    }
}
