<?php

namespace App\Http\Controllers\Frontend;

use App\CheckValue;
use App\CheckWithChargeValue;
use App\DateValue;
use App\DeepcleaningOrder;
use App\Http\Controllers\Controller;
use App\MultipleInputValues;
use App\Order;
use App\PaintingOrder;
use App\PestControlOrder;
use App\RadioValue;
use App\RadioWithChargeValue;
use App\Refer;
use App\SanitizationOrder;
use App\SelectValue;
use App\SelectWithChargeValue;
use App\Service;
use App\ServiceCategory;
use App\TextareaValue;
use App\TextValue;
use App\TimeValue;
use App\User;
use App\Wallet;
use App\WalletDebitCredit;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    protected $data = [];

    public function deletethis()
    {
        return view('deletethis');
    }

    public function result($query){

        $iparr = preg_split("/[\s,]+/",$query);
        $a = count($iparr);
        for ($i=0;$i<count($iparr);$i++)
        {
            if(!($iparr[$i]=="how" || $iparr[$i]=="to" ||$iparr[$i]=="the" ||$iparr[$i]=="in"||$iparr[$i]=="a"||$iparr[$i]=="by"||$iparr[$i]=="on"||$iparr[$i]=="for" ||$iparr[$i]=="is" || $iparr[$i]=="are" ||$iparr[$i]=="we" ||$iparr[$i]=="make" || $iparr[$i]=="our" || $iparr[$i]=="as" || $iparr[$i]=="if" || $iparr[$i]=="they" ||$iparr[$i]=="there" ||$iparr[$i]=="that" ||$iparr[$i]=="and"||$iparr[$i]=="from"||$iparr[$i]=="at"||$iparr[$i]=="your"||$iparr[$i]=="our"||$iparr[$i]=="us"))
            {
                $services = Service::where('name','LIKE', '%'.$iparr[$i].'%')->get();


                $service_categories = ServiceCategory::where('name','LIKE','%'.$iparr[$i].'%')->get();


                $service_providers = User::where('name','LIKE','%'.$iparr[$i].'%')->where('user_type',1)->get();




            }
        }



        return [
            'services'=>$services,
            'service_categories'=>$service_categories,
            'service_providers'=>$service_providers,

        ];

    }


    public function storeDynamicFieldValue($order_id , $service_id ,$data)
    {
        $order = Order::find($order_id);
        $service = Service::find($service_id);

        /*********************
         *  Time option field (option)
         *********************/

        if (count($service->time_fields)>0)
        {
            foreach($service->time_fields as $time_field)
            {
                $name = "time_".$time_field->id;
                if($data[$name] != "")
                {
                    TimeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$time_field->id,
                        'option_id'=>$data[$name],

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
                    if($data[$name] != "")
                    {
                        MultipleInputValues::create([
                            'order_id'=>$order->id,
                            'label_for_multiple_input_id'=>$input_field->parent_label->id,
                            'multiple_input_field_id'=>$input_field->id,
                            'value' =>$data[$name]
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
                if($data[$name] != "")
                {
                    DateValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$date_field->id,
                        'value'=>$data[$name],

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
                if($data[$name] != "")
                {
                    TextareaValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$textarea_field->id,
                        'value'=>$data[$name],

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
                if($data[$name] != "")
                {
                    TextValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$text_field->id,
                        'value'=>$data[$name],

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
                if($data[$name] != "")
                {
                    SelectValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$select_field->id,
                        'option_id'=>$data[$name],
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
                if($data[$name] != "")
                {
                    SelectWithChargeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$select_with_charge_field->id,
                        'option_id'=>$data[$name],
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
                if($data[$name] != "")
                {
                    RadioWithChargeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$radio_with_charge_field->id,
                        'option_id'=>$data[$name],
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
                if($data[$name] != "")
                {
                    RadioValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$radio_field->id,
                        'option_id'=>$data[$name],
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
                if($data[$name] != "")
                {
                    CheckWithChargeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$check_with_charge_field->id,
                        'option_id'=>$data[$name],
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
                if($data[$name] != "")
                {
                    CheckValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$check_field->id,
                        'option_id'=>$data[$name],
                        'qty'=>1
                    ]);
                }
            }
        }

    }


    public function useReferCode($order_id)
    {
        $order = Order::find($order_id);
        $refer = Refer::where('used_by_user',$order->user_id)->where('used',0)->first();
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
            $remark->remark = "Refer to user ".$order->user->name;
            $remark->save();

            /*** for user who use refer code ***/
            $wallet_of_refer_used_by = Wallet::where('user_id',$order->user_id)->first();
            $wallet_of_refer_used_by->point = $wallet_of_refer_used_by->point +point_for_refer_code_user();
            $wallet_of_refer_used_by->save();

            /* Remark for debit & credt of wallet*/
            $remark = new WalletDebitCredit();
            $remark->user_id = $order->user_id;
            $remark->wallet_credit = point_for_refer_code_user() ;
            $user_data = User::find($refer->refer_by_user);
            $remark->remark = "Use refer code of ".$user_data->name;
            $remark->save();


        }
    }

    public function storePestControlOrder($order_id,$data)
    {
        $orders = PestControlOrder::create([
            'order_id' =>$order_id,
            'premises_type' => $data['premises_type'],
            'home_type' => $data['home_type'],
            'home_size' => $data['home_size'],
            'treatment_for' =>json_encode($data['treatment_for']),
            'time' => $data['time'],
            'date' => $data['date'],
            'office_size' => $data['office_size'],
            'number_of_cabin' => $data['number_of_cabin'],
            'number_of_desk' => $data['number_of_desk'],

        ]);

    }

    public function storeDeepCleningOrder($order_id,$data)
    {

        $orders = DeepcleaningOrder::create([
            'order_id' =>$order_id,
            'premises_type' => $data['premises_type'],
            'home_type' => $data['home_type'],
            'home_size' => $data['home_size'],
            'time' => $data['time'],
            'date' => $data['date'],
            'office_size' => $data['office_size'],
            'number_of_cabin' => $data['number_of_cabin'],
            'number_of_desk' => $data['number_of_desk'],

        ]);


    }

    public function storeSanitizationOrder($order_id,$data)
    {

        $orders = SanitizationOrder::create([
            'order_id' =>$order_id,
            'premises_type' => $data['premises_type'],
            'home_type' => $data['home_type'],
            'home_size' => $data['home_size'],
            'time' => $data['time'],
            'date' => $data['date'],
            'office_size' => $data['office_size'],
            'number_of_cabin' => $data['number_of_cabin'],
            'number_of_desk' => $data['number_of_desk'],

        ]);

    }

    public function storePaintOrder($order_id,$data)
    {
        $orders = PaintingOrder::create([
            'order_id' =>$order_id,
            'premises_type' => $data['premises_type'],
            'home_type' => $data['home_type'],
            'home_size' => $data['home_size'],
            'paint_type1' => $data['paint_type1'],
            'paint_type2' => $data['paint_type2'],
            'current_color' => $data['current_color'],
            'furnished' => $data['furnished'],
            'ceiling_paint' => $data['ceiling_paint'],
            'time' => $data['time'],
            'date' => $data['date'],
            'office_size' => $data['office_size'],
            'number_of_cabin' => $data['number_of_cabin'],
            'number_of_desk' => $data['number_of_desk'],
            'comment' => $data['comment'],
        ]);

    }
}
