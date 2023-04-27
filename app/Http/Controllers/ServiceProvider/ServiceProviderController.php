<?php

namespace App\Http\Controllers\ServiceProvider;

use App\City;
use App\Http\Controllers\Controller;
use App\ServiceProviderDetail;
use App\User;
use App\UserOtherDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ServiceProviderController extends Controller
{
    public function index()
    {
        return view('service_provider.dashboard');
    }

    public function accountDetail()
    {
        $cities = City::where('name','!=',null)->get();
        $user = Auth::user();


        $a=[];
        foreach ($user->cities as $city)
        {
            $a[] = $city->id;
        }


        return view('service_provider.account_detail',compact('user','cities','a'));
    }

    public function updateAccountDetail(Request $request)
    {

       $user = Auth::user();
       $user->name = $request->name;

        if($request->hasFile('image')){

            $oldfile = public_path().'/uploads/logo/'.$user->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/uploads/logo/',$name);
            $user->image=$name;

        }



       $user->save();

        $user->cities()->sync($request->cities);

       $user_detail = ServiceProviderDetail::where('user_id',$user->id)->first();

       $user_detail->contact_person = $request->contact_person;
       $user_detail->contact_number = $request->contact_number;
       $user_detail->website = $request->website;
       $user_detail->number_of_employ = $request->number_of_employ;

       $user_detail->save();

        return back();

    }


    public function changePassword()
    {
        return view('service_provider.change_password');
    }

    public function changePasswordSubmit(Request $request)
    {
        $opass =$request->get('old_password');
        $dbpass = auth()->user()->password;
        if(!Hash::check($opass ,$dbpass)){
            return redirect()->back()->with('error_message','Old Password is wrong');
        }

        $new_password =$request->get('new_password');



        $user = User::find(auth()->user()->id);
        $user->password=bcrypt($new_password);
        if($user->save()){
            return redirect()->back()->with('message',' Password Changed Successfully .');
        }
    }


}
