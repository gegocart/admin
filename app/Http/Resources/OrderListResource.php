<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderListResource extends JsonResource
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
            'orderno'=>$this->orderno,
            'user_id'=>$this->user_id,
            'address'=>$this->address->address_1,
            'shippingmethod'=>$this->shippingMethod->name,
            'status'=>$this->status,
            'subtotal'=>$this->subtotal->amount(),
            'paymentmethod'=>$this->paymentMethod->gateway_name,
            // 'delete'=>url('/admin/order/'.$this->id.'/delete'),
        ];
    }
}
