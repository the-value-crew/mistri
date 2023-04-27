<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    private $accessToken;

    public function __construct($resource, $accessToken = '')
    {
        parent::__construct($resource);
        $this->accessToken = $accessToken;
    }

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
            'addtional_direction' =>$this->userdetail->addtional_direction,
            'access_token'   => $this->access_token
        ];
    }

    public function withResponse($request, $response)
    {
        if ($this->accessToken) {
            $response->withHeaders([
                'X-Access-Token' => $this->accessToken,
                'X-Token-Type' => 'bearer',
//                'X-Token-Expires-In' => auth()->guard('api')->factory()->getTTL() * 60,
            ]);
        }
    }
}
