<?php

namespace App\Http\Controllers\Frontend;

use App\Check2FieldValue;
use App\CheckFieldValue;
use App\CheckValue;
use App\CheckWithChargeValue;
use App\City;
use App\DateFieldValue;
use App\DateValue;
use App\Faq;
use App\HowItWork;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\GeneralEnquiry;
use App\Http\Requests\Frontend\ServiceEnquiry;
use App\Logo;
use App\Mail\MailToCustomerAfterOrder;
use App\Mail\SendReferCodeMail;
use App\MultipleInputValues;
use App\Notifications\NewOrder;
use App\Order;
use App\OurMission;
use App\Page;
use App\RadioFieldValue;
use App\RadioValue;
use App\RadioWithChargeValue;
use App\Refer;
use App\SelectFieldValue;
use App\SelectValue;
use App\SelectWithChargeValue;
use App\Service;
use App\ServiceCategory;
use App\Slider;
use App\SliderText;
use App\Testimonial;
use App\TextareaFieldValue;
use App\TextareaValue;
use App\TextFieldValue;
use App\TextValue;
use App\TimeFieldValue;
use App\TimeValue;
use App\User;
use App\UserOtherDetail;
use App\UserService;
use App\Wallet;
use App\WalletDebitCredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class WebsiteController extends CommonController
{
    public function index()
    {
        $ids =[];
        $id_array= UserService::pluck('user_id')->unique();

        foreach ($id_array as $item)
        {
            $ids[] = $item;
        }

        $this->data['ids']= $ids;
        $this->data['service_providers'] = User::where('user_type',1)->where('feature_in_homepage',"on")->where('status',1)->where('image','!=',null)->get();
        $this->data['testimonials'] = Testimonial::limit(3)->latest()->get();
        $this->data['service_categories'] = ServiceCategory::where('parent_id',null)->where('feature','on')->orderBy('priority')->limit(12)->get();
        $this->data['all_service_categories'] = ServiceCategory::where('parent_id',null)->orderBy('priority')->get();
        $this->data['datas'] = HowItWork::all();
        $this->data['slider'] =Slider::first();
        $this->data['slider_text']= SliderText::all();
        $this->data['logos'] = Logo::latest()->get();
        $this->data['cities'] = City::limit(4)->get();
        return view('frontend.index',$this->data);
    }

    public function terms()
    {
        $page = Page::find(5);
        return view('frontend.terms',compact('page'));
    }

    public function privacy()
    {
        $page = Page::find(4);
        return view('frontend.privacy',compact('page'));
    }
    public function testimonial()
    {
        $this->data['testimonials'] = Testimonial::latest()->get();
        return view('frontend.testimonials',$this->data);
    }
    public function service_category($slug)
    {
        $service_cat = ServiceCategory::where('slug',$slug)->first();
        $this->data['service_categories'] = ServiceCategory::where('parent_id',$service_cat->id)->get();
        $this->data['all_categories'] = ServiceCategory::where('parent_id',null)->orderBy('priority')->get();
        return view('frontend.sub_category',$this->data,compact('service_cat'));
    }

    public function servicesByCategory($slug)
    {
        $category = ServiceCategory::where('slug',$slug)->first();
        $this->data['service_categories'] = $category->services;
        $this->data['all_services'] = ServiceCategory::where('parent_id',null)->orderBy('priority')->get();
        return view('frontend.services_by_category',compact('category'),$this->data);
    }

    public function book_service($slug,$category_id)
    {
        $category = ServiceCategory::find($category_id);
        $service = Service::where('slug',$slug)->first();
        return view('frontend.service_booking_form',compact('service','category'));
    }

    public function service_enquiry(ServiceEnquiry $request)
    {
        $enquiry = new \App\ServiceEnquiry();

        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phn_no = $request->phn_no;
        $enquiry->company_name = $request->company_name;
        $enquiry->from = $request->from;
        $enquiry->looking_for = $request->looking_for;
        $enquiry->message = $request->message;
        $enquiry->save();

        return redirect('/#service-enquiry')->with('success', 'Your message sent successfully.');

    }

    public function general_enquiry(GeneralEnquiry $request)
    {
        $enquiry = new \App\GeneralEnquiry();

        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->subject = $request->subject;
        $enquiry->message = $request->message;

        $enquiry->save();
        return redirect('/contact-us#general-enquiry')->with('success', 'Your message sent successfully.');


    }

    public function about()
    {
        $this->data['missions'] = OurMission::latest()->get();
        $this->data['about'] = Page::find(3);
        return view('frontend.about',$this->data);
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function work()
    {
        $this->data['works'] = HowItWork::all();

        return view('frontend.work',$this->data);
    }

    public function faq()
    {
        $this->data['faqs']= Faq::latest()->get();
        return view('frontend.faq',$this->data);
    }

    public function profile()
    {
        $user = Auth::user();

        $walletRecords = $user->walletRecords;
        $refers = $user->refers;
        $wallet = $user->wallet;
        $count = count($walletRecords)+count($refers);

        return view('frontend.profile',compact('walletRecords','refers','wallet','count'));
    }


    public function ourServices()
    {
        $all_categories = ServiceCategory::where('parent_id',null)->where('feature','on')->orderBy('priority')->get();
        return view('frontend.our_services',compact('all_categories'));
    }
    public function service_request(Request $request ,$id)
    {


        if($request->suggest_vendor){

            $validator = Validator::make($request->all(), [
                'service_done_in'=>'required'
            ],[
                'service_done_in.required'=>"Select premises for service"
            ]);

        }else{
            $validator = Validator::make($request->all(), [
                'provider_id'=>'required',
                'service_done_in'=>'required'
            ],[
                'provider_id.required'=>"Please select service provider",
                'service_done_in.required'=>"Select premises for service"
            ]);
        }




        if ($validator->fails()) {

//            foreach ($validator->messages()->getMessages() as $field_name => $messages) {
//                $errors = $messages[0];
//            }

            return back()->withErrors($validator);

        }

        $service = Service::find($id);

        /****************************************************************************************
         *              store User detail
         ****************************************************************************************/


        $user = Auth::user();

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        $userDetail = UserOtherDetail::where('user_id',$user->id)->first();
        $userDetail->fulladdress = $request->fulladdress;
        $userDetail->street = $request->street;
        $userDetail->building = $request->building;
        $userDetail->flat_number = $request->flat_number;
        $userDetail->addtional_direction = $request->addtional_direction;

        $userDetail->save();

        /*****************************************************************************************
         * Save service Order
         *****************************************************************************************/

        $order = new Order();
        $order->user_id = Auth::user()->id;

        $order->service_id = $id;
        if($request->suggest_vendor){
            $order->suggest_vendor = $request->suggest_vendor;
            $order->provider_id = 1;
        }else{
            $order->suggest_vendor = 0;
            $order->provider_id = $request->provider_id;
        }


        $order->payment_info="Cash on delivery";
        $order->service_done_in = $request->service_done_in;

        $order->save();

        /*********************
         *  Time option field (option)
         *********************/

        if (count($service->time_fields)>0)
        {
            foreach($service->time_fields as $time_field)
            {
                $name = "time_".$time_field->id;
                if($request->$name != "")
                {
                    TimeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$time_field->id,
                        'option_id'=>$request->$name,

                    ]);
                }
            }
        }


        /****************************************
         *  Multiple input field under same label
         ***************************************/
        if (count($service->label_for_multiple_fields)>0)
        {
            foreach($service->label_for_multiple_fields as $label_for_multiple_field)
            {
                foreach ($label_for_multiple_field->input_fields as $input_field )
                {
                    $name = "input_field_".$input_field->id;
                    if($request->$name != "")
                    {
                        MultipleInputValues::create([
                            'order_id'=>$order->id,
                            'label_for_multiple_input_id'=>$input_field->parent_label->id,
                            'multiple_input_field_id'=>$input_field->id,
                            'value' =>$request->name
                        ]);
                    }

                }

            }
        }




        /*********************
         *  date  field
         *********************/

        if (count($service->date_fields)>0)
        {
            foreach($service->date_fields as $date_field)
            {
                $name = "date_".$date_field->id;
                if($request->$name != "")
                {
                    DateValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$date_field->id,
                        'value'=>$request->$name,

                    ]);
                }
            }
        }



        /*********************
         *  Textarea  field
         *********************/

        if (count($service->textarea_fields)>0)
        {
            foreach($service->textarea_fields as $textarea_field)
            {
                $name = "textarea_".$textarea_field->id;
                if($request->$name != "")
                {
                    TextareaValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$textarea_field->id,
                        'value'=>$request->$name,

                    ]);
                }
            }
        }

        /*********************
         *  Text  field
         *********************/

        if (count($service->text_fields)>0)
        {
            foreach($service->text_fields as $text_field)
            {
                $name = "text_".$text_field->id;
                if($request->$name != "")
                {
                    TextValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$text_field->id,
                        'value'=>$request->$name,

                    ]);
                }
            }
        }

        /*********************
         *  Store select field (option)
         *********************/

        if (count($service->select_fields)>0)
        {
            foreach($service->select_fields as $select_field)
            {
                $name = "select_".$select_field->id;
                if($request->$name != "")
                {
                    SelectValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$select_field->id,
                        'option_id'=>$request->$name,
                        'qty'=>1
                    ]);
                }
            }
        }

        /*********************
         *  select  field (option-charge)
         *********************/

        if (count($service->select_with_charge_fields)>0)
        {
            foreach($service->select_with_charge_fields as $select_with_charge_field)
            {
                $name = "select_c_".$select_with_charge_field->id;
                if($request->$name != "")
                {
                    SelectWithChargeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$select_with_charge_field->id,
                        'option_id'=>$request->$name,
                        'qty'=>1
                    ]);
                }
            }
        }



        /*********************
         *  Store radio field (option-charge)
         *********************/

        if (count($service->radio_with_charge_fields)>0)
        {
            foreach($service->radio_with_charge_fields as $radio_with_charge_field)
            {
                $name = "radio_c_".$radio_with_charge_field->id;
                if($request->$name != "")
                {
                    RadioWithChargeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$radio_with_charge_field->id,
                        'option_id'=>$request->$name,
                        'qty'=>1
                    ]);
                }
            }
        }

        /*********************
         *  Store radio field (option)
         *********************/

        if (count($service->radio_fields)>0)
        {
            foreach($service->radio_fields as $radio_field)
            {
                $name = "radio_".$radio_field->id;
                if($request->$name != "")
                {
                    RadioValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$radio_field->id,
                        'option_id'=>$request->$name,
                        'qty'=>1
                    ]);
                }
            }
        }


        /*********************
         *  Check  field (option-charge)
         *********************/

        if (count($service->check_with_charge_fields)>0)
        {
            foreach($service->check_with_charge_fields as $check_with_charge_field)
            {
                $name = "check_c_".$check_with_charge_field->id;
                if($request->$name != "")
                {
                    CheckWithChargeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$check_with_charge_field->id,
                        'option_id'=>$request->$name,
                        'qty'=>1
                    ]);
                }
            }
        }

        /*********************
         *  Store check field (option)
         *********************/

        if (count($service->check_fields)>0)
        {
            foreach($service->check_fields as $check_field)
            {
                $name = "check_".$check_field->id;
                if($request->$name != "")
                {
                    CheckValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$check_field->id,
                        'option_id'=>$request->$name,
                        'qty'=>1
                    ]);
                }
            }
        }

        $provider = User::find($request->provider_id);
        $provider->notify(new NewOrder($order,$user->name));

//        Mail::to($user->email)->send(new MailToCustomerAfterOrder('user',$user,$order));

        if ($request->use_code)
        {
            $refer = Refer::where('used_by_user',$user->id)->where('used',0)->first();
            if ($refer)
            {
                $refer->used = 1;
                $refer->save();

                /** Update Wallet */

                    /*** For User who refer ***/
                        $user_who_refer_id = $refer->refer_by_user;
                        $wallet_of_refer_by = Wallet::where('user_id',$user_who_refer_id)->first();
                        $wallet_of_refer_by->point = $wallet_of_refer_by->point + point_for_refer() ;
                        $wallet_of_refer_by->save();

                        /* Remark for debit & credt of wallet*/
                        $remark = new WalletDebitCredit();
                        $remark->user_id = $user_who_refer_id;
                        $remark->wallet_credit = point_for_refer() ;
                        $remark->remark = "Refer to user ".$user->name;
                        $remark->save();

                    /*** for user who use refer code ***/
                        $wallet_of_refer_used_by = Wallet::where('user_id',$user->id)->first();
                        $wallet_of_refer_used_by->point = $wallet_of_refer_used_by->point +point_for_refer_code_user();
                        $wallet_of_refer_used_by->save();

                        /* Remark for debit & credt of wallet*/
                        $remark = new WalletDebitCredit();
                        $remark->user_id = $user->id;
                        $remark->wallet_credit = point_for_refer_code_user() ;
                        $user_data = User::find($refer->refer_by_user);
                        $remark->remark = "Use refer code from user  ".$user_data->name;
                        $remark->save();


            }
        }

        return back()->with('message','Your service order placed successfully');


    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if($request->hasFile('image')){

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/uploads/user/',$name);
            $user->image=$name;

        }

        $user->save();



        $userDetail = UserOtherDetail::where('user_id',$user->id)->first();
        $userDetail->fulladdress = $request->fulladdress;
        $userDetail->street = $request->street;
        $userDetail->building = $request->building;
        $userDetail->flat_number = $request->flat_number;
        $userDetail->addtional_direction = $request->addtional_direction;

        $userDetail->save();

        return back()->with('message','Changes saved successfully');
    }

    public function changePassword(Request $request)
    {
        if(Auth::user()->social_from != "normal" && Auth::user()->password == null){

            $validator = Validator::make($request->all(), [
                'password'=> 'required | confirmed ',
                'password_confirmation' => 'required ',
            ]);

            if ($validator->fails()) {
                return redirect("/my-profile#changepass-tab")->withErrors($validator);
            }

            $new_password =$request->password;

            $user = Auth::user();
            $user->password=bcrypt($new_password);
            if($user->save()){
                return redirect("/my-profile#changepass-tab")->with('message',' Password set successfully .');
            }else{
                return redirect("my-profile#changepass-tab")->back()->with('message','Something went wrong !');
            }

        }else{

            $validator = Validator::make($request->all(), [
                'password'=> 'required | confirmed ',
                'password_confirmation' => 'required ',
                'old_password'=>'required'
            ]);

            if ($validator->fails()) {
                return redirect("/my-profile#changepass-tab")->withErrors($validator);
            }

            $opass =$request->get('old_password');
            $dbpass = auth()->user()->password;
            $new_password =$request->password;



            if(!Hash::check($opass ,$dbpass)){
                return redirect("/my-profile#changepass-tab")->with('error-message','Old Password is wrong');
            }

            if(Hash::check($new_password ,$dbpass)){
                return redirect("/my-profile#changepass-tab")->with('error-message','New Password cannot be same as old password');
            }



            $user = Auth::user();
            $user->password=bcrypt($new_password);
            if($user->save()){
                return redirect("/my-profile#changepass-tab")->with('message',' Password change successfully .');
            }else{
                return redirect("my-profile#changepass-tab")->back()->with('message',' Password could not be Changed');
            }
        }

    }

    public function viewAllServiceCategory()
    {
        $this->data['service_categories'] = ServiceCategory::where('parent_id',null)->orderBy('priority')->get();
        return view('frontend.view_all_service_category',$this->data);
    }

    public function searchResult()
    {
        $query = request('query');
        $results = $this->result($query);


        return view('frontend.search_result',compact('query','results'));
    }

    public function providerDetail($id,$slug)
    {
        $provider = User::where('id',$id)->where('user_type',1)->with('details')->first();
        return view('frontend.provider_detail',compact('provider'));
    }

    public function serviceProviderDetail($id,$service_id)
    {
        $provider = User::where('id',$id)->where('user_type',1)->with('details')->first();
        $data = [
            'name' => $provider->name,


        ] ;
        return response()->json($data);
    }


    public function referFriend(Request $request)
    {

       $user = Auth::user();

        /**  Code to send refer code */

        Mail::to($request->email)->send(new SendReferCodeMail($user));

        /**  Code to send refer code  */

        return back()->with('message','Thank you for your referral');
    }

    public function serviceProviderIncluded($provider_name,$provider_id,$service_name,$service_id)
    {

        $data = UserService::where(['user_id'=>$provider_id,'service_id'=>$service_id])->first();
        $admin_include = Service::find($service_id);
        return view('frontend.service_included',compact('data','admin_include'));

    }

    public function serviceProviderTerms($provider_name,$provider_id,$service_name,$service_id)
    {
        $data = UserService::where(['user_id'=>$provider_id,'service_id'=>$service_id])->first();
        $admin_terms = Service::find($service_id);
        return view('frontend.service_terms',compact('data','admin_terms'));

    }
}
