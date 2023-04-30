<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MailToAdminAfterVendorRegister;
use App\Providers\RouteServiceProvider;
use App\Refer;
use App\User;
use App\UserOtherDetail;
use App\Wallet;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class
RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->refer_code= uniqid("SOU".$user->id."&");
        $wallet = new Wallet();
        $wallet->user_id = $user->id;
        $wallet->save();

        $user->save();

        /** If come through refer or have refer code */

        if ($data['refer_code'])
        {
            $refer_code = $data['refer_code'];
            $refer_user = User::where('refer_code',$refer_code)->first();

            $refer = new Refer();
            $refer->refercode = $refer_code;
            $refer->refer_by_user = $refer_user->id;
            $refer->used_by_user = $user->id;
            $refer->used = false;
            $refer->save();

        }




        $user_detail = new UserOtherDetail();
        $user_detail->user_id = $user->id;
        $user_detail->save();

        //Mail::to($user->email)->send(new MailToAdminAfterVendorRegister('user',$user));

        return $user;
    }
}
