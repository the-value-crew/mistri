<?php

namespace App\Http\Controllers\Api;

use App\Check2FieldValue;
use App\CheckFieldValue;
use App\DateFieldValue;
use App\DateValue;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OrderResource;
use App\Notifications\NewOrder;
use App\Order;
use App\RadioFieldValue;
use App\RadioValue;
use App\RadioWithChargeValue;
use App\SelectFieldValue;
use App\SelectValue;
use App\SelectWithChargeValue;
use App\TextareaFieldValue;
use App\TextareaValue;
use App\TextFieldValue;
use App\TextValue;
use App\TimeFieldValue;
use App\TimeValue;
use App\User;
use App\UserOtherDetail;
use Illuminate\Http\Request;

class OrderController extends CommonControllerer
{
    public function placeOrder(Request $request)
    {


        /*****************************************************************/

        $user = auth()->guard('api')->user();

        $user = User::find($user->id);

        $user->name = $request->user_detail['name'];
        $user->email = $request->user_detail['email'];
        $user->phone = $request->user_detail['phone'];

        if($request->hasFile($request->user_detail['image']))
        {
            $file=$request->file($request->user_detail['image']);
            $name =time().$file->getClientOriginalName();
//            Image::make($request->image)->resize(500, 250)->save(public_path('backend/images/').$name);

            $file->move(public_path().'/uploads/page/',$name);
            $user->image=$name;
        }
        $user->save();




        $userDetail = UserOtherDetail::where('user_id',$user->id)->first();

        $userDetail->fulladdress = $request->user_detail['fulladdress'];
        $userDetail->street = $request->user_detail['street'];
        $userDetail->building = $request->user_detail['building'];
        $userDetail->flat_number = $request->user_detail['flat_number'];
        $userDetail->addtional_direction = $request->user_detail['additional_direction'];
        $userDetail->save();




        $order = new Order();
        $order->user_id = $user->id;
        $order->provider_id = $request->service_provider_id;
        $order->service_id = $request->service_id;
        $order->payment_info = "Cash on delivery";
        $order->save();


        if ($request->service_id == 72)    //for service pest control
        {
            $this->pestControlOrder($order->id,$request->all());

        }elseif ($request->service_id == 84)  //for deep cleaning service
        {
            $this->deepCleanOrder($order->id,$request->all());

        }elseif ($request->service_id == 85) //for sanotization cleaning service
        {
            $this->sanitizationOrder($order->id,$request->all());

        }elseif ($request->service_id == 86) //for painting cleaning service
        {
            $this->paintOrder($order->id,$request->all());
        }
        else{

            /*******************************************************************
             *Save form field  values
             *****************************************************************/

            /**  save select field */
            if (count($request->select_field_charge_notapplied)>0)
            {
                foreach($request->select_field_charge_notapplied as $key=>$value)
                {

                    SelectValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$value['id'],
                        'option_id'=>$value['option_id'],
                    ]);


                }
            }


            /**  save select field ( with charge ) */
            if (count($request->select_fields)>0)
            {
                foreach($request->select_fields as $key=>$value)
                {

                    SelectWithChargeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$value['id'],
                        'option_id'=>$value['option_id'],
//                    'qty'=>$value['qty']
                    ]);


                }
            }


            /**  save radio field */
            if (count($request->radio_field_charge_notapplied)>0)
            {
                foreach($request->radio_field_charge_notapplied as $key=>$value)
                {

                    RadioValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$value['id'],
                        'option_id'=>$value['option_id'],
                    ]);


                }
            }


            /**  save radio field ( with charge ) */
            if (count($request->radiobutton_fields)>0)
            {
                foreach($request->radiobutton_fields as $key=>$value)
                {

                    RadioWithChargeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$value['id'],
                        'option_id'=>$value['option_id'],
//                    'qty'=>$value['qty']
                    ]);


                }
            }

            /** Save Time  */
            if (count($request->time_fields)>0)
            {
                foreach($request->time_fields as $key=>$value)
                {

                    TimeValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$value['id'],
                        'option_id'=>$value['option_id']
                    ]);
                }
            }

            /** Save Date */
            if (count($request->date_fields)>0)
            {
                foreach($request->date_fields as $key=> $value)
                {
                    DateValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$value['id'],
                        'value'=>$value['value'],

                    ]);

                }
            }

            /** Save Textarea ***/
            if (count($request->textarea_fields)>0)
            {
                foreach($request->textarea_fields as $key=> $value)
                {
                    TextareaValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$value['id'],
                        'value'=>$value['value'],

                    ]);

                }
            }


            /** Save Text Field */
            if (count($request->text_fields)>0)
            {
                foreach($request->text_fields as $key=> $value)
                {
                    TextValue::create([
                        'order_id'=>$order->id,
                        'field_id'=>$value['id'],
                        'value'=>$value['value'],

                    ]);

                }
            }

        }








//        $provider = User::find($request->service_provider_id);
//        $provider->notify(new NewOrder($order,$user->name));

        return response()->json(['data' => [],
            'status' => true,
            'message' => 'success',
            'code' => 200], 200);

    }

    public function getOrders()
    {
        $user = auth()->guard('api')->user();
        $orders = $user->customer_orders;
        return OrderResource::collection($orders);
    }


}
