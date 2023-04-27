<?php

namespace App\Http\Resources\Api;


use App\RadioOptionWithCharge;
use App\SelectOptionWithCharge;
use App\TimeValue;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'order_id'    => $this->id,
            'service_provider_id' => $this->provider_id,
            'payment_infor'=>$this->payment_info,
            'order_at'=>$this->created_at->format('d-M-Y'),
            'order_status'=>$this->status,
            'order_for_servcie'=>$this->service->name,
            "min_service_charge"=>(double)minServiceCharge($this->service->id,$this->provider_id),
            'customer_detail'=>
                [
                    'name'=>$this->user->name,
                    'email'=>$this->user->email,
                    'phone'=>$this->user->phone,
                    'flat_number'=>$this->user->userdetail->flat_number,
                    'building'=>$this->user->userdetail->building,
                    'street'=>$this->user->userdetail->street,
                    'fulladdress'=>$this->user->userdetail->fulladdress,
                    'additional_direction'=>$this->user->userdetail->additional_direction,

                ],

            'text_fields'=>$this->service->text_fields->map(function($n) use($request){
                return array(
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'value'=> textFieldValue($this->id,$n->id),

                );
            }),

            'text_area_fields'=>$this->service->textarea_fields->map(function($n) use($request){
                return array(
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'value'=> textareaFieldValue($this->id,$n->id),

                );
            }),

            'date_fields'=>$this->service->date_fields->map(function($n) use($request){
                return array(
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'value'=> dateFieldValue($this->id,$n->id),

                );
            }),

            'time_fields'=>$this->service->time_fields->map(function($n) use($request){
                return array(
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'value'=>timeFieldValue($this->id,$n->id)

                );
            }),

            'radiobutton_fields'=>$this->service->radio_with_charge_fields->map(function($n) use($request){
                return array(

                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'option'=>RadioOptionWithCharge::find(\App\RadioWithChargeValue::where('order_id',$this->id)->where('field_id',$n->id)->first()->option_id)->option,
                    'charge'=>radioWithChargeValue($this->id,$n->id,$this->provider_id)

                );
            }),

            'radio_field_charge_notapplied'=>$this->service->radio_fields->map(function($n) use($request){
                return array(
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'value'=>radioValue($this->id,$n->id)

                );
            }),

            'select_fields'=>$this->service->select_with_charge_fields->map(function($n) use($request){
                return array(

                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'option' =>SelectOptionWithCharge::find(\App\SelectWithChargeValue::where('order_id',$this->id)->where('field_id',$n->id)->first()->option_id)->option,
                    'charge'=>selectWithChargeValue($this->id,$n->id,$this->provider_id)

                );
            }),

            'select_field_charge_notapplied'=>$this->service->select_fields->map(function($n) use($request){
                return array(
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'value'=>selectValue($this->id,$n->id)

                );
            }),

            'total_bill_amount'    => totalBillAmount($this->id,$this->service->id,$this->provider_id)

        ];
    }
}
