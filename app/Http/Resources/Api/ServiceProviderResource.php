<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderResource extends JsonResource
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

            'id'      => $this->id,
            'name'    => $this->name,
            'service_providers'=>$this->users->map(function($n) use($request){
            return array(
                'id'=>$n->id,
                'name'    => $n->name,
                'email'    => $n->email,
                'image'   => $n->image_url(),
                'min_service-charge'=>(double)minServiceCharge($this->id,$n->id),
                'other_details'=>route('provider.orher.detail',$n->id)


            );
    }),


        ];
    }
}
