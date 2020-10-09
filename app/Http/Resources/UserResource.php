<?php

namespace App\Http\Resources;

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
            'id'=>$this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at'=>$this->email_verified_at,
            'status'=>$this->status,
            'usergroup_id'=>$this->usergroup_id,
            'image'=>$this->image,
        ];
    }
}
