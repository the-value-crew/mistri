<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderDetailResource extends JsonResource
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
            'provider_id'      => $this->user_id,
            'number_of_employ'    => $this->number_of_employ,
            'contact_person'   => $this->contact_person,
            'contact_number'=>$this->contact_number,
            'website'=>$this->website,

        ];
    }
}
