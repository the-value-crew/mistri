<?php

namespace App\Http\Controllers\Admin;

use App\CheckField;
use App\CheckFieldWithCharge;
use App\CheckOption;
use App\CheckoptionValue;
use App\CheckOptionWithCharge;
use App\DateField;
use App\Http\Controllers\Controller;
use App\LabelForMultipleInput;
use App\MultipleInputField;
use App\OfficePestControl;
use App\PestControlTreatmentType;
use App\RadioField;
use App\RadioFieldWithCharge;
use App\RadioOption;
use App\RadioOptionWithCharge;
use App\ResidentialPestControl;
use App\SelectField;
use App\SelectFieldWithCharge;
use App\SelectOption;
use App\SelectOptionWithCharge;
use App\Service;
use App\ServiceCategory;
use App\ServiceCheck2Field;
use App\ServiceCheck2Option;
use App\ServiceCheckoptionField;
use App\ServiceDateField;
use App\ServiceRadioField;
use App\ServiceSelectField;
use App\ServiceSelectFieldOption;
use App\ServiceTextareaField;
use App\ServiceTextField;
use App\ServiceTimeField;
use App\ServiceTimeValue;
use App\ServieRadioOption;
use App\TextareaField;
use App\TextField;
use App\Time2Field;
use App\TimeField;
use App\TimeFieldOption;
use App\User;
use App\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = ServiceCategory::where('parent_id',null)->get();
        $this->data['services'] = Service::latest()->get();
        return view('admin.service.index',$this->data);
    }

    public function serviceByCategory($id ,$slug)
    {
        $this->data['parent_categories'] = ServiceCategory::where('parent_id',null)->get();
        $services=ServiceCategory::find($id)->services;
        $this->data['cat']=ServiceCategory::find($id);
        return view('admin.service.service_by_category',$this->data,compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createServiceForm($id , $slug)
    {
        if($id == 72)
        {
           $apartment_pest_controls = ResidentialPestControl::where('home_type','Apartment')->get();
           $villa_pest_controls = ResidentialPestControl::where('home_type','Villa')->get();
           $office_pest_controls = OfficePestControl::get();

            return view('admin.service.pest_control_service',compact('apartment_pest_controls','villa_pest_controls','office_pest_controls'));
        }
        $service = Service::find($id);
        return view('admin.service.create_form',compact('service'));
    }

    public function updateResidentialPestControl(Request $request,$id)
    {

        $data = ResidentialPestControl::find($id);
        $data->studio = $request->studio;
        $data->bhk1 = $request->bhk1;
        $data->bhk2 = $request->bhk2;
        $data->bhk3 = $request->bhk3;
        $data->bhk4 = $request->bhk4;
        $data->bhk5 = $request->bhk5;
        $data->save();
        return back()->with('message','Updated Successfully');

    }

    public function updateOfficePestControl(Request $request,$id)
    {
        $data = OfficePestControl::find($id);
        $data->home_size1 = $request->home_size1;
        $data->home_size2 = $request->home_size2;
        $data->home_size3 = $request->home_size3;
        $data->home_size4 = $request->home_size4;
        $data->save();
        return back()->with('message','Updated Successfully');

    }
    public function create()
    {
        $this->data['edit']=false;
        $this->data['categories'] = ServiceCategory::all();
        return view('admin.service.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'image'=> 'required',
            'service_category_id' => 'required',
        ]);

        $service = new Service();
        $service->service_category_id = $request->service_category_id;
        $service->name = $request->name;
        $service->min_service_charge = $request->min_service_charge;
        $service->short_description = $request->short_description;
        $service->terms_and_conditions = $request->terms_and_conditions;
        $service->whats_included = $request->whats_included;
        $service->quotable_service = $request->quotable_service;

        $service->slug = Str::slug($request->name);

        if($request->hasFile('image')){

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/uploads/service/',$name);
            $service->image=$name;

        }

        $service->save();


        return redirect(route('service.index'))->with('message','Service created successfully .');



    }

    public function storeServiceField(Request $request)
    {
        /***  Save select (without price )fields */
        if($request->select_label_for_form != null && $request->select_label_for_invoice != null) {
            if ($request->select2_option) {
                if (count_nonnull_field($request->select2_option) > 0) {

                    $select2_field = SelectField::create([
                        'service_id'=>$request->service_id,
                        'label_for_form'=>$request->select_label_for_form,
                        'label_for_invoice'=>$request->select_label_for_invoice
                    ]);

                    foreach ($request->select2_option as $key=>$value){
                        SelectOption::create([
                            'select_field_id'=>$select2_field->id,
                            'option'=>$request->select2_option[$key],

                        ]);
                    }

                }
            }
        }
        /***  /Save select (without price )fields */



        /***  Save select (with price )fields */
        if($request->select_with_price_label_for_form != null && $request->select_with_price_label_for_invoice != null){
            if ($request->select_option && $request->select_charge){
                if (count_nonnull_field($request->select_option)>0 && count_nonnull_field($request->select_charge)>0){
                    $select_field = SelectFieldWithCharge::create([
                        'service_id'=>$request->service_id,
                        'label_for_form'=>$request->select_with_price_label_for_form,
                        'label_for_invoice'=>$request->select_with_price_label_for_invoice
                    ]);

                    foreach ($request->select_option as $key=>$value){
                        SelectOptionWithCharge::create([
                            'select_field_with_charge_id'=>$select_field->id,
                            'option'=>$request->select_option[$key],
                            'charge'=>$request->select_charge[$key]
                        ]);
                    }
                }
            }
        }

        /***  /Save select (with price )fields */


        /***  Save radio (without price )fields */
        if($request->radio_label_for_form != null && $request->radio_label_for_invoice != null) {
            if ($request->radio2_option) {
                if (count_nonnull_field($request->radio2_option) > 0) {

                    $radio2_field = RadioField::create([
                        'service_id'=>$request->service_id,
                        'label_for_form'=>$request->radio_label_for_form,
                        'label_for_invoice'=>$request->radio_label_for_invoice
                    ]);

                    foreach ($request->radio2_option as $key=>$value){
                        RadioOption::create([
                            'radio_field_id'=>$radio2_field->id,
                            'option'=>$request->radio2_option[$key],

                        ]);
                    }

                }
            }
        }
        /***  Save radio (without price )fields */

        /***  Save radio (with price )fields */
        if($request->radio_with_price_label_for_form != null && $request->radio_with_price_label_for_invoice != null){
            if ($request->radio_option && $request->radio_charge){
                if (count_nonnull_field($request->radio_option)>0 && count_nonnull_field($request->radio_charge)>0){
                    $radio_field = RadioFieldWithCharge::create([
                        'service_id'=>$request->service_id,
                        'label_for_form'=>$request->radio_with_price_label_for_form,
                        'label_for_invoice'=>$request->radio_with_price_label_for_invoice
                    ]);

                    foreach ($request->radio_option as $key=>$value){
                        RadioOptionWithCharge::create([
                            'radio_field_with_charge_id'=>$radio_field->id,
                            'option'=>$request->radio_option[$key],
                            'charge'=>$request->radio_charge[$key]
                        ]);
                    }
                }
            }
        }
        /***  Save radio (with price )fields */


        /***  Save check (without price )fields */
        if($request->check_label_for_form != null && $request->check_label_for_invoice != null) {
            if ($request->check2_option) {
                if (count_nonnull_field($request->check2_option) > 0) {

                    $check2_field = CheckField::create([
                        'service_id'=>$request->service_id,
                        'label_for_form'=>$request->check_label_for_form,
                        'label_for_invoice'=>$request->check_label_for_invoice
                    ]);

                    foreach ($request->check2_option as $key=>$value){
                        CheckOption::create([
                            'check_field_id'=>$check2_field->id,
                            'option'=>$request->check2_option[$key],

                        ]);
                    }

                }
            }
        }
        /***  Save check (without price )fields */


        /***  Save check (with price )fields */
        if($request->check_with_price_label_for_form != null && $request->check_with_price_label_for_invoice != null){
            if ($request->check_option && $request->check_charge){
                if (count_nonnull_field($request->check_option)>0 && count_nonnull_field($request->check_charge)>0){
                    $check_field = CheckFieldWithCharge::create([
                        'service_id'=>$request->service_id,
                        'label_for_form'=>$request->check_with_price_label_for_form,
                        'label_for_invoice'=>$request->check_with_price_label_for_invoice
                    ]);

                    foreach ($request->check_option as $key=>$value){
                        CheckOptionWithCharge::create([
                            'check_field_with_charge_id'=>$check_field->id,
                            'option'=>$request->check_option[$key],
                            'charge'=>$request->check_charge[$key]
                        ]);
                    }
                }
            }
        }
        /***  Save check fields */



        /***  Save date fields */
        if (count_nonnull_field($request->date_label_for_form)>0){
            foreach ($request->date_label_for_form as $key => $value)
            {
                DateField::create([
                    'service_id'=>$request->service_id,
                    'label_for_form'=>$request->date_label_for_form[$key],
                    'label_for_invoice'=>$request->date_label_for_invoice[$key]
                ]);
            }
        }
        /***  Save date fields */


        /****  Save time2 field **/
        if (count_nonnull_field($request->time2_label_for_form)>0){
            foreach ($request->time2_label_for_form as $key => $value)
            {
                Time2Field::create([
                    'service_id'=>$request->service_id,
                    'label_for_form'=>$request->time2_label_for_form[$key],
                    'label_for_invoice'=>$request->time2_label_for_invoice[$key]
                ]);
            }
        }

        /*** Save time2 filed **/


        /***  Save time fields */
        if($request->time_label_for_form != null && $request->time_label_for_invoice != null)
        {
            if ($request->time_option)
            {
                if (count_nonnull_field($request->time_option)>0){
                    $time_field = TimeField::create([
                        'service_id'=>$request->service_id,
                        'label_for_form'=>$request->time_label_for_form,
                        'label_for_invoice'=>$request->time_label_for_invoice
                    ]);

                    foreach ($request->time_option as $key=>$value){
                        TimeFieldOption::create([
                            'time_field_id'=>$time_field->id,
                            'time'=>$request->time_option[$key],
                        ]);
                    }
                }

            }
        }
        /***  Save time fields */


        /**  Save multiple input fields **/
        if($request->multiple_input_label_for_form != null && $request->multiple_input_label_for_invoice != null)
        {
            if ($request->multiple_field)
            {
                if (count_nonnull_field($request->multiple_field)>0){
                    $label_for_multiple_label = LabelForMultipleInput::create([
                        'service_id'=>$request->service_id,
                        'label_for_form'=>$request->multiple_input_label_for_form,
                        'label_for_invoice'=>$request->multiple_input_label_for_invoice
                    ]);

                    foreach ($request->multiple_field as $key=>$value){
                        MultipleInputField::create([
                            'label_for_multiple_input_id'=>$label_for_multiple_label->id,
                            'input_field_label'=>$request->multiple_field[$key],
                        ]);
                    }
                }

            }
        }

        /**  / Save multiple input fields **/


        /***  Save textarea fields */
        if (count_nonnull_field($request->textarea_label_for_form)>0){
            foreach ($request->textarea_label_for_form as $key => $value)
            {
                TextareaField::create([
                    'service_id'=>$request->service_id,
                    'label_for_form'=>$request->textarea_label_for_form[$key],
                    'label_for_invoice'=>$request->textarea_label_for_invoice[$key]
                ]);
            }
        }
        /*** / Textarea field **/


        /***  Save text fields */
        if (count_nonnull_field($request->text_label_for_form)>0){
            foreach ($request->text_label_for_form as $key => $value)
            {
                TextField::create([
                    'service_id'=>$request->service_id,
                    'label_for_form'=>$request->text_label_for_form[$key],
                    'label_for_invoice'=>$request->text_label_for_invoice[$key]
                ]);
            }
        }
        /*** Text field **/


        return back()->with('message','Service form created successfully .');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['edit']=true;
        $this->data['service'] =Service::find($id);
        $this->data['categories'] = ServiceCategory::all();
        return view('admin.service.create',$this->data);

    }

    public function editServiceForm($id , $slug)
    {
        $service = Service::find($id);
        return view('admin.service.edit_form',compact('service'));
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


        $service = Service::find($id);
        $service->service_category_id = $request->service_category_id;
        $service->name = $request->name;
        $service->min_service_charge = $request->min_service_charge;
        $service->slug = Str::slug($request->name);
        $service->short_description = $request->short_description;
        $service->terms_and_conditions = $request->terms_and_conditions;
        $service->whats_included = $request->whats_included;
        $service->quotable_service = $request->quotable_service;

        if($request->hasFile('image')){

            $oldfile = public_path().'/uploads/service/'.$service->image;
            if(\File::exists($oldfile)){
                \File::delete($oldfile);
            }

            $file=$request->file('image');
            $name =time().$file->getClientOriginalName();
            $file->move(public_path().'/uploads/service/',$name);
            $service->image=$name;

        }

        $service->save();


        return back()->with('message','Service updated successfully .');
    }


    public function changestatus($id)
    {
        $service = Service::find($id);

        if($service->feature == "on")
        {
            $service->feature = "off";
        }
        else{
            $service->feature = "on";
        }

        $service->save();

        return response()->json(['message'=>'Service status updated successfully .']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        $oldfile = public_path().'/uploads/service/'.$service->image;
        if(\File::exists($oldfile)){
            \File::delete($oldfile);
        }

        $service->delete();
        return back();
    }

    public function serviceRequest()
    {
//        $services = DB::table('user_service')->latest()->get();
//        return view('admin.service.service_request',compact('services'));


        $vendors = User::where(['user_type'=>1,'status'=>1])->latest()->get();

        return view('admin.service.all_vendors',compact('vendors'));
    }

    public function vendorServices($vendor_id,$vendor_name)
    {
        $vendor = User::with(['services','nonApprovedServices'])->find($vendor_id);
//        return $vendor;
        return view('admin.service.services_by_vendor',compact('vendor'));

    }

    public function updateServiceRequest(Request $request)
    {

        $status = $request->status;
        $user_service_id = $request->user_service_id;

        $user_service = UserService::find($user_service_id);
        $user_service->state = $status;
        $user_service->save();

        return back()->with('message','Status updated successfully');

    }

    public function serviceRequestDetail($id)
    {
        $service_request = UserService::find($id);

       return view('admin.service.service_request_deatil',compact('service_request'));
    }

    public function changepriority($value , $id,$category_id, Request $request)
    {
        $service = Service::find($id);

        $ids = Service::where('service_category_id',$category_id)->pluck('priority')->toArray();

        if(in_array($value,$ids)){

            return response()->json(['message1'=>'Service Priority Number has already been taken .']);
        }else{

            $service->priority = $value;
            $service->save();
            return response()->json(['message'=>'Service  priority updated successfully .']);

        }





    }
}
