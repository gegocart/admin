<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivateUserResource extends JsonResource
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
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'gateway_customer_id'=>$this->gateway_customer_id,
            'usergroup_id'=>$this->usergroup_id,
            'image'=>$this->image
        ];
    }
}
