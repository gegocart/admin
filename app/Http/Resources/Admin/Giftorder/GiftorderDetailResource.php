<?php

namespace App\Http\Resources\Admin\Giftorder;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftorderDetailResource extends JsonResource
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
            'from'=>$this->order->orderitem->from,
            'to_email'=>$this->orderitem->to_email,
            'card_amount'=>$this->amount,
            'code'=>$this->code,
            'expire'=>$this->expire_on,
           // 'expire'=>date($this->expire_on,"Y/m/d H:i:s"),
             //'exipire'=>date('d-m-y',strtotime($this->expire_on)),
            'used'=>$this->is_used,
            //'used_date'=>$this->giftorder->created_at,
            'used_order'=>$this->giftorder->orderno,
           'used_date'=>date('d-m-y',strtotime($this->giftorder->created_at)),
           'used_by'=>$this->giftorder->user->name,
            
            
        ];
    }
}
