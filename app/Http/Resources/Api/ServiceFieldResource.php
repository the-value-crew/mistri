<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceFieldResource extends JsonResource
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
            'service_name'    => $this->name,

            'text_fields'=>$this->text_fields->map(function($n) use($request){
                return array(
                    'id'=>$n->id,
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice

                );
            }),

            'textarea_fields'=>$this->textarea_fields->map(function($n) use($request){
                return array(
                    'id'=>$n->id,
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice

                );
            }),
            'date_fields'=>$this->date_fields->map(function($n) use($request){
                return array(
                    'id'=>$n->id,
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice
                );
            }),
            'time_fields'=>$this->time_fields->map(function($n) use($request){
                return array(
                    'id'=>$n->id,
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'options'=>$n->time_options->map(function($to) use($request){
                        return array(
                            'id'=>$to->id,
                            'time-option'=>$to->time,
                        );
                    }),
                );
            }),
            'radiobutton_fields'=>$this->radio_with_charge_fields->map(function($n) use($request){
                return array(
                    'id'=>$n->id,
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'options'=>$n->radio_with_charge_options->map(function($co) use($request){
                        return array(
                            'id'=>$co->id,
                            'check-option'=>$co->option,
                            'check-charge'=>$co->charge,
                        );
                    }),
                );
            }),
            'radio_field_charge_notapplied'=>$this->radio_fields->map(function($n) use($request){
                return array(
                    'id'=>$n->id,
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'options'=>$n->radio_options->map(function($co) use($request){
                        return array(
                            'id'=>$co->id,
                            'check-option'=>$co->option,
                        );
                    }),
                );
            }),
            'select_fields'=>$this->select_with_charge_fields->map(function($s) use($request){
                return array(
                    'id'=>$s->id,
                    'label_for_form'=>$s->label_for_form,
                    'label_for_invoice'=>$s->label_for_invoice,
                    'options'=>$s->select_with_charge_options->map(function($so) use($request){
                        return array(
                            'id'=>$so->id,
                            'select-option'=>$so->option,
                            'select-charge'=>$so->charge,
                        );
                    }),
                );
            }),
            'select_field_charge_notapplied'=>$this->select_fields->map(function($n) use($request){
                return array(
                    'id'=>$n->id,
                    'label_for_form'=>$n->label_for_form,
                    'label_for_invoice'=>$n->label_for_invoice,
                    'options'=>$n->select_options->map(function($co) use($request){
                        return array(
                            'id'=>$co->id,
                            'check-option'=>$co->option,
                        );
                    }),
                );
            }),




        ];
    }
}
