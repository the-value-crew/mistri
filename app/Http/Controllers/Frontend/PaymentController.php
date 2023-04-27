<?php

namespace App\Http\Controllers\Frontend;

use App\CheckValue;
use App\CheckWithChargeValue;
use App\DateValue;
use App\HowItWork;
use App\Http\Controllers\Controller;
use App\Mail\MailToCustomerAfterOrder;
use App\Notifications\NewOrder;
use App\Order;
use App\RadioValue;
use App\RadioWithChargeValue;
use App\Refer;
use App\SelectValue;
use App\SelectWithChargeValue;
use App\Service;
use App\ServiceCategory;
use App\Slider;
use App\SliderText;
use App\Testimonial;
use App\TextareaValue;
use App\TextValue;
use App\TimeValue;
use App\User;
use App\UserOtherDetail;
use App\UserService;
use App\Wallet;
use App\WalletDebitCredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class PaymentController extends CommonController
{
    public function place_order(Request $request,$id)
    {

        /** Place Order and  set status to not_ready $telrManager */
        if($request->provider_id == "suggest_vendor"){

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
            return back()->withErrors($validator);
        }

        $service = Service::find($id);

        /****************************************************************************************
         *              store User detail
         ****************************************************************************************/


        $user = Auth::user();


            $user->name = $request->name;
            $user->phone = $request->phone;
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
        if($request->provider_id == "suggest_vendor"){
            $order->suggest_vendor = 1;
            $order->provider_id = 1;
            $order->payment_info="Cash On Delivery";
            $order->status ="pending";
        }else{
            $order->payment_info="Telr Payment";
            $order->status ="not_ready";
            $order->suggest_vendor = 0;
            $order->provider_id = $request->provider_id;
        }
        $order->service_done_in = $request->service_done_in;
        $order->save();


        if ($service->id == 72)    //for service pest control
        {
            $this->storePestControlOrder($order->id,$request->all());

        }elseif ($service->id == 84)  //for deep cleaning service
        {
            $this->storeDeepCleningOrder($order->id,$request->all());
        }elseif ($service->id == 85) //for sanotization cleaning service
        {
            $this->storeSanitizationOrder($order->id,$request->all());
        }elseif ($service->id == 86) //for painting cleaning service
        {
            $this->storePaintOrder($order->id,$request->all());
        }
        else{
            $this->storeDynamicFieldValue($order->id,$service->id,$request->all());
        }




//      $provider = User::find($request->provider_id);
//      $provider->notify(new NewOrder($order,$user->name));
      Mail::to($user->email)->send(new MailToCustomerAfterOrder('user',$user,$order));

        if($request->provider_id == "suggest_vendor" || $service->quotable_service == 1){

                /** Use refe code if not used */
                $this->useReferCode($order->id);
                /** - Use refe code if not used */

                if( $service->quotable_service == 1)
                {
                    $order->payment_info=" - ";
                    $order->status ="pending";
                    $order->save();
                }

                  $provider = User::find($request->provider_id);
                  $provider->notify(new NewOrder($order,$user->name));
                  Mail::to($user->email)->send(new MailToCustomerAfterOrder('user',$user,$order));
                  Mail::to($order->vendor->email)->send(new MailToCustomerAfterOrder('admin',$user,$order));

                  return back()->with('message',"Your order placed successfully");

        }
        else{

            /** /Place order $telrManager */

            $telrManager = new \TelrGateway\TelrManager();

            $billingParams = [
                'first_name' => $user->name,
                'sur_name' => 'Surname',
                'address_1' => 'Gnaklis',
                'address_2' => 'Gnaklis 2',
                'city' => 'Alexandria',
                'region' => 'San Stefano',
                'zip' => '000000',
                'country' => 'ARE',
                'email' => $user->email,
            ];

            return $telrManager->pay($order->id, totalServiceCharge($order->id), $service->name, $billingParams)->redirect();
        }


    }



    public function success()
    {
        $order = Order::where('user_id',Auth::user()->id)->where('status','not_ready')->first();
        $order->status = "pending";
        $order->save();

        $user = User::find($order->user_id);
        /** Use refer code not used */
        $this->useReferCode($order->id);
        /** Use refer code not used */



        $provider = User::find($order->provider_id);
//        $provider->notify(new NewOrder($order,$order->user->name));

        Mail::to($order->user->email)->send(new MailToCustomerAfterOrder('user',$user,$order));
        Mail::to($order->vendor->email)->send(new MailToCustomerAfterOrder('admin',$user,$order));

        return redirect(url('/'))->with('message',"Your order placed successfully");
    }

    public function cancel()
    {
        return view('frontend.payment_cancel');
    }

    public function declined()
    {
        return view('frontend.payment_declined');
    }
}
