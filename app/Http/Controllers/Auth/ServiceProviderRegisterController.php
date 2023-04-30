<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MailToAdminAfterVendorRegister;
use App\Providers\RouteServiceProvider;
use App\Service;
use App\ServiceCategory;
use App\ServiceProviderDetail;
use App\User;
use App\UserOtherDetail;
use App\UserService;
use App\Website;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ServiceProviderRegisterController extends Controller
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
    protected $redirectTo = '/service-provider/dashboard';

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
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $service_categories = ServiceCategory::all();
        return view('auth.provider-register',compact('service_categories'));
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email' => 'required|unique:users',
            'cities'=>'required',
            'services'=>'required',
            'number_of_employ'=>'required',
            'contact_person'=>'required',
            'contact_number'=>'required',

            'license'=>"required|mimes:pdf"

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->user_type = 1;

        if($request->hasFile('image')){

            $filee=$request->file('image');
            $namee =time().$filee->getClientOriginalName();
            $filee->move(public_path().'/uploads/logo/',$namee);
            $user->image=$namee;

        }


        if($request->hasFile('license')){

            $file=$request->file('license');
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/license/',$name);
            $user->license=$name;

        }


       $user->password = Hash::make('employer@12345678');
       $user->save();


        $user_detail = new UserOtherDetail();
        $user_detail->user_id = $user->id;
        $user_detail->save();


        $user->cities()->sync($request->cities);

        /** @var  $detail */

        foreach ($request->services as $service){
//            $user->services()->sync(ServiceCategory::find($service)->services);
            foreach (ServiceCategory::find($service)->services as $s){
                $data = new UserService();
                $data->user_id = $user->id;
                $data->service_category_id =$service;
                $data->service_id = $s->id;
                $data->save();
            }
        }

        /** @var  $detail */

       $detail = new ServiceProviderDetail();

       $detail->user_id = $user->id;
       $detail->number_of_employ = $request->number_of_employ;
       $detail->contact_person = $request->contact_person;
       $detail->contact_number = $request->contact_number;
       $detail->website = $request->website;
       $detail->message = $request->message;
       $detail->save();

      $s = Website::find(1);
        //Mail::to($s->email_2)->send(new MailToAdminAfterVendorRegister('admin',$user));
//        Mail::to("kavita2aryal@gmail.com")->send(new MailToAdminAfterVendorRegister('admin',$user));
       // Mail::to($user->email)->send(new MailToAdminAfterVendorRegister('user',$user));



        return back()->with('success','Your application sent successfully .We will contact you within 2 workings days.');



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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
