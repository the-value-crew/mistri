<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserOtherDetail;
use App\Wallet;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $user =\App\User::where('email',$request->email)->first();

        if(! \App\User::where('email',$request->email)->where('status',0)->exists())
        {
            return redirect()->back()->with('error-email','Invalid Email');
        }
        $pass =$request->password;


        if(!Hash::check($pass ,$user->password))
        {
            return redirect()->back()->with('error','Password does not match');
        }

        if (Auth::guard()->attempt(['email'=>$request->email , 'password'=>$request->password,'status'=>0],$request->remember))
        {

            return redirect()->intended(route('home-page'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }


    public function vendorLogin(Request $request)
    {
        $this->validate($request,[
            'vendor_email'=>'required|email',
            'vendor_password'=>'required|min:6'
        ]);

        $user =\App\User::where('email',$request->vendor_email)->first();

        if(! \App\User::where('email',$request->vendor_email)->where('status',1)->exists())
        {
            return redirect('login#vendor')->with('vendor-error-email','Invalid Email');
        }
        $pass =$request->vendor_password;


        if(!Hash::check($pass ,$user->password))
        {
            return redirect('login#vendor')->with('vendor-error','Password does not match');
        }

        if (Auth::guard()->attempt(['email'=>$request->vendor_email , 'password'=>$request->vendor_password,'status'=>1],$request->remember))
        {
            return redirect()->intended(route('service.provider.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));

    }

    public function reset(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:6'
        ]);


        $user = User::where('email',$request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

//        $this->guard()->login($user);

        if (Auth::guard()->attempt(['email'=>$request->email , 'password'=>$request->password,'status'=>1]))
        {
            return redirect()->intended(route('service.provider.dashboard'));
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
//        $data = Socialite::driver('google')->user();
        $data = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $data->email)->first();

        if(!is_null($user)) {
            $user->name        =  $data->user['name'];
            $user->social_id   = $data->user['id'];
            $user->social_from = 'google';
            $user->user_type    = 0;
        } else {
            $user = User::where('social_id', $data->user['id'])->first();
            if(is_null($user)) {
                // Create a new user
                $user              = new User();
                $user->name        =  $data->user['name'];
                $user->social_id   = $data->user['id'];
                $user->social_from = 'google';
                $user->email       = $data->email;
                $user->user_type    = 0;
                $user->save();

                /** create wallet for user */
                $user->refer_code= uniqid("SOU".$user->id."&");
                $wallet = new Wallet();
                $wallet->user_id = $user->id;
                $wallet->save();
                $user->save();

                $user_detail = new UserOtherDetail();
                $user_detail->user_id = $user->id;
                $user_detail->save();
            }
        }
        Auth::login($user);

        return redirect(route('home-page'))->with('success_message', 'Successfully logged in!');


    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $data = Socialite::driver('facebook')->stateless()->user();
        $user = User::where('email', $data->email)->first();
        if(!is_null($user)) {
            $user->name        = $data->user['name'];
            $user->social_id   = $data->user['id'];
            $user->social_from = 'facebook';
            $user->user_type    = 0;
        } else {
            $user = User::where('social_id', $data->user['id'])->first();
            if(is_null($user)) {
                // Create a new user
                $user              = new User();
                $user->social_id   = $data->user['id'];
                $user->name        = $data->user['name'];
                $user->social_from = 'facebook';
                $user->email       = $data->email;
                $user->user_type    = 0;
                $user->save();

                /** create wallet for user */
                $user->refer_code= uniqid("SOU".$user->id."&");
                $wallet = new Wallet();
                $wallet->user_id = $user->id;
                $wallet->save();
                $user->save();



                $user_detail = new UserOtherDetail();
                $user_detail->user_id = $user->id;
                $user_detail->save();
            }
        }
        Auth::login($user);

        return redirect(route('home-page'))->with('success_message', 'Successfully logged in!');

    }
}
