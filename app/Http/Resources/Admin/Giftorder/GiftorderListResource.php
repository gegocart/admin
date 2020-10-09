<?php

namespace App\Http\Resources\Admin\Giftorder;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftorderListResource extends JsonResource
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

            'order_id'=>$this->order_id,
            'orderno'=>$this->order->orderno,
            'to_email'=>$this->to_email,
            'card_amount'=>$this->price,
            'quantity'=>$this->quantity,
            //'exipire'=>$this->expire_on,
            'exipire'=>date('dd-mm-yyyy', strtotime($this->expire_on)),
            'used'=>$this->used(),
            'status'=>$this->status,
            
            
        ];
    }
}
