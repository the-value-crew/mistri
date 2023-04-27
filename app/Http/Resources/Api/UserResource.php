<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email'   => $this->email,
            'phone' => $this->phone ?? '',
            'image'   => $this->image_url(),
            'fulladdress' =>$this->userdetail->fulladdress,
            'street' =>$this->userdetail->street,
            'building' =>$this->userdetail->building,
            'flat_number' =>$this->userdetail->flat_number,
            'additional_direction' =>$this->userdetail->additional_direction,
        ];
    }
}
