<?php

namespace App\Http\Controllers\Admin;


use App\CheckField;
use App\CheckFieldWithCharge;
use App\CheckOption;
use App\CheckOptionWithCharge;
use App\DateField;
use App\Http\Controllers\Controller;

use App\RadioField;
use App\RadioFieldWithCharge;
use App\RadioOption;
use App\RadioOptionWithCharge;
use App\SelectField;
use App\SelectFieldWithCharge;
use App\SelectOption;
use App\SelectOptionWithCharge;
use App\TextareaField;
use App\TextareaValue;
use App\TextField;
use App\TimeField;
use App\TimeFieldOption;
use Illuminate\Http\Request;

class ServiceFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTimeOption(Request $request)
    {
        $service_time_field_id = $request->service_time_field_id;

        return $request->timefield;
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
        //
    }

    public function editTextField($id)
    {
        $textfield = TextField::find($id);
        return view('admin.serviceField.edit_text_field',compact('textfield'));
    }

    public function editTextareaField($id)
    {
        $textareafield = TextareaField::find($id);
        return view('admin.serviceField.edit_textarea_field',compact('textareafield'));
    }

    public function editDateField($id)
    {
        $field = DateField::find($id);
        return view('admin.serviceField.edit_date_field',compact('field'));
    }

    public function editTimeField($id)
    {
        $field = TimeField::find($id);
        return view('admin.serviceField.edit_time_field',compact('field'));
    }

    public function editCheckFieldWithCharge($id)
    {
        $field = CheckFieldWithCharge::find($id);
        return view('admin.serviceField.edit_check_field_with_charge',compact('field'));
    }

    public function editCheckField($id)
    {
        $field = CheckField::find($id);
        return view('admin.serviceField.edit_check_field',compact('field'));

    }

    public function editRadioField($id){
        $field = RadioField::find($id);
        return view('admin.serviceField.edit_radio_field',compact('field'));
    }
    public function editSelectField($id)
    {
        $field = SelectField::find($id);
        return view('admin.serviceField.edit_select_field',compact('field'));
    }

    public function editRadioFieldWithCharge($id)
    {
        $field = RadioFieldWithCharge::find($id);
        return view('admin.serviceField.edit_radio_field_with_charge',compact('field'));
    }

    public function editSelectFieldWithCharge($id)
    {
        $field = SelectFieldWithCharge::find($id);
        return view('admin.serviceField.edit_select_field_with_charge',compact('field'));
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

    }

    public function updateTextField(Request $request , $id)
    {
        $textfield = TextField::find($id);
        $textfield->label_for_form = $request->label_for_form;
        $textfield->label_for_invoice = $request->label_for_invoice;
        $textfield->save();

        return back()->with('message','Field updated successfully');
    }

    public function updateTextareaField(Request $request , $id)
    {
        $textareafield = TextareaField::find($id);
        $textareafield->label_for_form = $request->label_for_form;
        $textareafield->label_for_invoice = $request->label_for_invoice;
        $textareafield->save();

        return back()->with('message','Field updated successfully');
    }

    public function updateDateField(Request $request , $id)
    {
        $field = DateField::find($id);
        $field->label_for_form = $request->label_for_form;
        $field->label_for_invoice = $request->label_for_invoice;
        $field->save();

        return back()->with('message','Field updated successfully');
    }

    public function updateTimeField(Request $request , $id)
    {
        $field = TimeField::find($id);
        $field->label_for_form = $request->label_for_form;
        $field->label_for_invoice = $request->label_for_invoice;
        $field->save();


        if(count($request->timefield)>0)
        {
            $count = count($request->timefield);

            $time_options = $request->timefield;

            for ($i=0;$i<$count;$i++)
            {
                $data4 =array(
                    'time_field_id'=>$id,
                    'time'=>$time_options[$i],
                );
                $insert_data4[]=$data4;
            }

            TimeFieldOption::insert($insert_data4);

        }

        return back()->with('message','Field updated successfully');
    }

    public function updateCheckFieldWithCharge(Request $request , $id)
    {
        $field = CheckFieldWithCharge::find($id);
        $field->label_for_form = $request->label_for_form;
        $field->label_for_invoice = $request->label_for_invoice;
        $field->save();

        if($request->option && $request->charge )
        {

            if((count($request->option)>0)  && (count($request->charge)>0))
            {
                $count = count($request->option);

                $options = $request->option;
                $charge = $request->charge;

                for ($i=0;$i<$count;$i++)
                {
                    $data3 =array(
                        'check_field_with_charge_id'=>$id,
                        'option'=>$options[$i],
                        'charge'=>$charge[$i],
                    );
                    $insert_data3[]=$data3;
                }

                CheckOptionWithCharge::insert($insert_data3);

            }

        }


        return back()->with('message','Field updated successfully');
    }

    public function updateCheckField(Request $request , $id)
    {
        $field = CheckField::find($id);
        $field->label_for_form = $request->label_for_form;
        $field->label_for_invoice = $request->label_for_invoice;
        $field->save();

        if($request->option)
        {

            if((count($request->option)>0))
            {
                $count = count($request->option);

                $options = $request->option;
                $charge = $request->charge;

                for ($i=0;$i<$count;$i++)
                {
                    $data3 =array(
                        'check_field_id'=>$id,
                        'option'=>$options[$i],

                    );
                    $insert_data3[]=$data3;
                }

                CheckOption::insert($insert_data3);

            }

        }


        return back()->with('message','Field updated successfully');

    }

    public function updateRadioFieldWithCharge(Request $request , $id)
    {
        $field = RadioFieldWithCharge::find($id);
        $field->label_for_form = $request->label_for_form;
        $field->label_for_invoice = $request->label_for_invoice;
        $field->save();

        if($request->option && $request->charge )
        {

            if((count($request->option)>0)  && (count($request->charge)>0))
            {
                $count = count($request->option);

                $options = $request->option;
                $charge = $request->charge;

                for ($i=0;$i<$count;$i++)
                {
                    $data3 =array(
                        'radio_field_with_charge_id'=>$id,
                        'option'=>$options[$i],
                        'charge'=>$charge[$i],
                    );
                    $insert_data3[]=$data3;
                }

                RadioOptionWithCharge::insert($insert_data3);

            }

        }


        return back()->with('message','Field updated successfully');
    }

    public function updateSelectFieldWithCharge(Request $request , $id)
    {
        $field = SelectFieldWithCharge::find($id);
        $field->label_for_form = $request->label_for_form;
        $field->label_for_invoice = $request->label_for_invoice;
        $field->save();

        if($request->option && $request->charge )
        {

            if((count($request->option)>0)  && (count($request->charge)>0))
            {
                $count = count($request->option);

                $options = $request->option;
                $charge = $request->charge;

                for ($i=0;$i<$count;$i++)
                {
                    $data3 =array(
                        'select_field_with_charge_id'=>$id,
                        'option'=>$options[$i],
                        'charge'=>$charge[$i],
                    );
                    $insert_data3[]=$data3;
                }

                SelectOptionWithCharge::insert($insert_data3);

            }

        }


        return back()->with('message','Field updated successfully');
    }
    public function updateRadioField(Request $request,$id)
    {
        $field = RadioField::find($id);
        $field->label_for_form = $request->label_for_form;
        $field->label_for_invoice = $request->label_for_invoice;
        $field->save();

        if($request->option)
        {

            if((count($request->option)>0))
            {
                $count = count($request->option);

                $options = $request->option;
                $charge = $request->charge;

                for ($i=0;$i<$count;$i++)
                {
                    $data3 =array(
                        'radio_field_id'=>$id,
                        'option'=>$options[$i],

                    );
                    $insert_data3[]=$data3;
                }

                RadioOption::insert($insert_data3);

            }

        }


        return back()->with('message','Field updated successfully');
    }


    public function updateSelectField(Request $request,$id)
    {
        $field = SelectField::find($id);
        $field->label_for_form = $request->label_for_form;
        $field->label_for_invoice = $request->label_for_invoice;
        $field->save();

        if($request->option)
        {

            if((count($request->option)>0))
            {
                $count = count($request->option);

                $options = $request->option;
                $charge = $request->charge;

                for ($i=0;$i<$count;$i++)
                {
                    $data3 =array(
                        'select_field_id'=>$id,
                        'option'=>$options[$i],

                    );
                    $insert_data3[]=$data3;
                }

                SelectOption::insert($insert_data3);

            }

        }


        return back()->with('message','Field updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function timeOptionDestroy($id)
    {
        $option  = TimeFieldOption::find($id);
        $option->delete();
        return back();
    }

    public function checkOptionWithChargeDestroy($id)
    {
        $option  = CheckOptionWithCharge::find($id);
        $option->delete();
        return back();
    }

    public function radioOptionWithChargeDestroy($id)
    {
        $option  = RadioOptionWithCharge::find($id);
        $option->delete();
        return back();
    }

    public function checkOptionDestroy($id)
    {
        $option  = CheckOption::find($id);
        $option->delete();
        return back();

    }

    public function radioOptionDestroy($id)
    {
        $option  = RadioOption::find($id);
        $option->delete();
        return back();
    }

    public function selectOptionDestroy($id){
        $option  = SelectOption::find($id);
        $option->delete();
        return back();
    }

    public function selectOptionWithChargeDestroy($id)
    {
        $option  = SelectOptionWithCharge::find($id);
        $option->delete();
        return back();
    }



    public function deleteTextField($id)
    {
        $field = TextField::find($id);
        $field->delete();
        return back();

    }

    public function deleteTextareaField($id)
    {
        $field = TextareaField::find($id);
        $field->delete();
        return back();
    }
    public function deleteDateField($id)
    {
        $field = DateField::find($id);
        $field->delete();
        return back();

    }
    public function deleteTimeField($id)
    {
        $field = TimeField::find($id);
        $field->delete();
        return back();
    }

    public function checkFieldWithChargeDestroy($id)
    {
        $field = CheckFieldWithCharge::find($id);
        $field->delete();
        return back();
    }

    public function selectFieldWithChargeDestroy($id)
    {
        $field = SelectFieldWithCharge::find($id);
        $field->delete();
        return back();
    }



    public function radioFieldWithChargeDestroy($id){
        $field = RadioFieldWithCharge::find($id);
        $field->delete();
        return back();
    }




    public function checkFieldDestroy($id)
    {
        $field = CheckField::find($id);
        $field->delete();
        return back();

    }

    public function radioFieldDestroy($id)
    {
        $field = RadioField::find($id);
        $field->delete();
        return back();
    }

    public function selectFieldDestroy($id)
    {
        $field = SelectField::find($id);
        $field->delete();
        return back();
    }


}
