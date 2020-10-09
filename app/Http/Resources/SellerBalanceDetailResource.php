<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellerBalanceDetailResource extends JsonResource
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
            'transactionid'=>$this->id,
            'order_id' => $this->order_id,
            'user_id' => $this->user_id,
            'type'=>$this->type,
            'status'=>$this->status,
            'action'=>$this->action
        ];
    }
}
