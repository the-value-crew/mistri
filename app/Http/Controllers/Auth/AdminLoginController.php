<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }


    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $admin =\App\Admin::where('email',$request->email)->first();

        if(! \App\Admin::where('email',$request->email)->exists())
        {
            return redirect()->back()->with('error-email','Email does not exists');
        }

        $pass =$request->password;
        if(!Hash::check($pass ,$admin->password))
        {
            return redirect()->back()->with('error','Password does not match');
        }

        if (Auth::guard('admin')->attempt(['email'=>$request->email , 'password'=>$request->password],$request->remember))
        {

            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout(Request $request)
    {   Auth::guard('admin')->logout();

        return redirect('/');
    }
}
