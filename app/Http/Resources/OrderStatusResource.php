<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderStatusResource extends JsonResource
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
            'order_id' => $this->id,
            'orderno'=>$this->order->orderno,
            'seller_id'=>$this->seller_id,
            'buyer_id'=>$this->buyer_id,
            'itemstatus' => $this->status,
            'product'=>$this->productdetail->product->name,
            'orderstatus'=>$this->order->status
        ];
    }
}
