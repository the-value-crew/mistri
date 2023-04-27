<?php

namespace App\Http\Controllers\ServiceProvider;

use App\CheckOptionWithCharge;
use App\Http\Controllers\Controller;
use App\Mail\ServiceRequestEmail;
use App\OfficePestControl;
use App\RadioOptionWithCharge;
use App\ResidentialPestControl;
use App\SelectOptionWithCharge;
use App\Service;
use App\ServiceCategory;
use App\User;
use App\UserService;
use App\VendorCheckFieldCharge;
use App\VendorOfficePC;
use App\VendorRadioFieldCharge;
use App\VendorResidentialPC;
use App\VendorSelectFieldCharge;
use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Auth::user()->services;
        $categories =ServiceCategory::where('parent_id',null)->get();
        return view('service_provider.service.index',compact('services','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $ser = Auth::user()->services;
//        $ids= $ser->pluck('id');
//
//        $services = Service::whereNotIn('id',$ids)->get();

        $services =  Auth::user()->notApprovedService;

        return view('service_provider.service.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = UserService::where('user_id',Auth::user()->id)->where('service_id',$request->service_id)->first();

        if($data){
            return back()->with('error_message','You had already requested for this service. Wait for admin approval');
        }else{

            $name ='';
            if($request->hasFile('document')){

                $file=$request->file('document');
                $name =time().$file->getClientOriginalName();

                $file->move(public_path().'/uploads/document/',$name);


            }

            DB::table('user_service')->insert(
                array(
                    'user_id'     =>   Auth::user()->id,
                    'service_id'   =>   $request->service_id,
                    'message'=>$request->message,
                    'document'=>$name
                )
            );

            $service = Service::find($request->service_id);
            $vendor = User::find(Auth::user()->id);
            $s = Website::find(1);
            Mail::to($s->email_2)->send(new ServiceRequestEmail($vendor,$service));


            return back()->with('message','Request send successfully');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    public function serviceStatus()
    {


        $services = Auth::user()->nonApprovedServices;
        return view('service_provider.service.service_status',compact('services'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = UserService::where('user_id',Auth::user()->id)->where('service_id',$id)->first();
        $service = Service::with(['check_with_charge_fields','radio_with_charge_fields','select_with_charge_fields'])->find($id);
        return view('service_provider.service.edit',compact('service','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = UserService::where('user_id',Auth::user()->id)->where('service_id',$id)->first();

        $data->vendor_min_service_charge = $request->vendor_min_service_charge;
        $data->terms_and_conditions = $request->terms_and_conditions;
        $data->whats_included = $request->whats_included;
        $data->save();



        /** Check field */
        if($request->check_charge){
            if(count_nonnull_field($request->check_charge)>0)
            {

                foreach ($request->check_charge as $key=>$value){


                    $check_opt = CheckOptionWithCharge::find($request->option_id[$key]);
                    $data = VendorCheckFieldCharge::where('option_id',$request->option_id[$key])->where('service_provider_id',Auth::user()->id)->first();

                    if($data){
                        $data->charge = $request->check_charge[$key];
                        $data->save();
                    }else{
                        VendorCheckFieldCharge::create([
                            'service_provider_id'=>Auth::user()->id,
                            'field_id'=>$check_opt->check_field_with_charge->id,
                            'option_id'=>$request->option_id[$key],
                            'service_id'=>$request->service_id,
                            'charge'=>$request->check_charge[$key],
                        ]);
                    }
                }
            }
        }


        /** Radio Field */
        if ($request->radio_charge){
            if(count_nonnull_field($request->radio_charge)>0)
            {
                foreach ($request->radio_charge as $key=>$value){
                    $radio_opt = RadioOptionWithCharge::find($request->radio_option_id[$key]);
                    $radio_data = VendorRadioFieldCharge::where('option_id',$request->radio_option_id[$key])->where('service_provider_id',Auth::user()->id)->first();

                    if($radio_data){
                        $radio_data->charge = $request->radio_charge[$key];
                        $radio_data->save();
                    }else{
                        VendorRadioFieldCharge::create([
                            'service_provider_id'=>Auth::user()->id,
                            'field_id'=>$radio_opt->radio_field_with_charge->id,
                            'option_id'=>$request->radio_option_id[$key],
                            'service_id'=>$request->service_id,
                            'charge'=>$request->radio_charge[$key],
                        ]);
                    }
                }
            }
        }


        /** Select field */

        if ($request->select_charge){
            if(count_nonnull_field($request->select_charge)>0)
            {
                foreach ($request->select_charge as $key=>$value){
                    $select_opt = SelectOptionWithCharge::find($request->select_option_id[$key]);
                    $select_data = VendorSelectFieldCharge::where('option_id',$request->select_option_id[$key])->where('service_provider_id',Auth::user()->id)->first();

                    if($select_data){
                        $select_data->charge = $request->select_charge[$key];
                        $select_data->save();
                    }else{
                        VendorSelectFieldCharge::create([
                            'service_provider_id'=>Auth::user()->id,
                            'field_id'=>$select_opt->select_field_with_charge->id,
                            'option_id'=>$request->select_option_id[$key],
                            'service_id'=>$request->service_id,
                            'charge'=>$request->select_charge[$key],
                        ]);
                    }
                }
            }
        }



        return back()->with('message','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function del($id)
    {
        $data =DB::table('user_service')->where('user_id',Auth::user()->id)->where('service_id',$id)->get();

        foreach ($data as $d){
            $id = $d->id;
            DB::delete(DB::raw("DELETE FROM user_service WHERE id = $id"));

        }

        return back()->with('message','Service request cancled successfully');

    }
    public function destroy($id)
    {
        $data = UserService::where('service_id',$id)->where('user_id',Auth::user()->id)->first();
        $data->delete();
    }

    public function getPestControlCharge()
    {
        $apartment_pest_controls = ResidentialPestControl::where('home_type','Apartment')->get();
        $villa_pest_controls = ResidentialPestControl::where('home_type','Villa')->get();
        $office_pest_controls = OfficePestControl::get();
        return view('service_provider.service.pest_control_service',compact('apartment_pest_controls','villa_pest_controls','office_pest_controls'));
    }

    public function updateApartmentPestControl(Request $request,$treatment_type_id)
    {
        $data = VendorResidentialPC::where(['home_type'=>'Apartment','vendor_id'=>Auth::user()->id,'treatment_type_id'=>$treatment_type_id])->first();

        if ($data)
        {
            $data->home_type = $request->home_type;
            $data->vendor_id = Auth::user()->id;
            $data->treatment_type_id = $treatment_type_id;
            $data->studio = $request->studio;
            $data->bhk1 = $request->bhk1;
            $data->bhk2 = $request->bhk2;
            $data->bhk3 = $request->bhk3;
            $data->bhk4 = $request->bhk4;
            $data->bhk5 = $request->bhk5;
            $data->save();
            return back();

        }else{
            $data = new VendorResidentialPC();
            $data->home_type = $request->home_type;
            $data->vendor_id = Auth::user()->id;
            $data->treatment_type_id = $treatment_type_id;
            $data->studio = $request->studio;
            $data->bhk1 = $request->bhk1;
            $data->bhk2 = $request->bhk2;
            $data->bhk3 = $request->bhk3;
            $data->bhk4 = $request->bhk4;
            $data->bhk5 = $request->bhk5;
            $data->save();
            return back();
        }
    }


    public function updateVillaPestControl(Request $request,$treatment_type_id)
    {
        $data = VendorResidentialPC::where(['home_type'=>'Villa','vendor_id'=>Auth::user()->id,'treatment_type_id'=>$treatment_type_id])->first();

        if ($data)
        {
            $data->home_type = $request->home_type;
            $data->vendor_id = Auth::user()->id;
            $data->treatment_type_id = $treatment_type_id;
            $data->studio = $request->studio;
            $data->bhk1 = $request->bhk1;
            $data->bhk2 = $request->bhk2;
            $data->bhk3 = $request->bhk3;
            $data->bhk4 = $request->bhk4;
            $data->bhk5 = $request->bhk5;
            $data->save();
            return back();

        }else{
            $data = new VendorResidentialPC();
            $data->home_type = $request->home_type;
            $data->vendor_id = Auth::user()->id;
            $data->treatment_type_id = $treatment_type_id;
            $data->studio = $request->studio;
            $data->bhk1 = $request->bhk1;
            $data->bhk2 = $request->bhk2;
            $data->bhk3 = $request->bhk3;
            $data->bhk4 = $request->bhk4;
            $data->bhk5 = $request->bhk5;
            $data->save();
            return back();
        }

    }

    public function updateOfficePestControl(Request $request,$treatment_type_id)
    {

        $data = VendorOfficePC::where(['vendor_id'=>Auth::user()->id,'treatment_type_id'=>$treatment_type_id])->first();

        if ($data)
        {
            $data->vendor_id = Auth::user()->id;
            $data->treatment_type_id = $treatment_type_id;
            $data->home_size1 = $request->home_size1;
            $data->home_size2 = $request->home_size2;
            $data->home_size3 = $request->home_size3;
            $data->home_size4 = $request->home_size4;

            $data->save();
            return back();

        }else{
            $data = new VendorOfficePC();
            $data->vendor_id = Auth::user()->id;
            $data->treatment_type_id = $treatment_type_id;
            $data->home_size1 = $request->home_size1;
            $data->home_size2 = $request->home_size2;
            $data->home_size3 = $request->home_size3;
            $data->home_size4 = $request->home_size4;
            $data->save();

            return back();
        }

    }

}
