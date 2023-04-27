<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceCategoryResource extends JsonResource
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
            'image'   => $this->image_url(),
            'count_children'=>count($this->services),
            'sub_categories' =>route('sub.category', ['id' => $this->id])
        ];
    }
}
