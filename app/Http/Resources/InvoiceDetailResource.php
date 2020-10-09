<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PrivateUserResource;

class InvoiceDetailResource extends JsonResource
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
            'invoiceno'=>$this->invoiceno,
            'order_id'=>$this->order_id,
            'order_product_id'=>$this->order_product_id,
            'user_id'=>$this->user_id,
            'invoicedate'=>date('Y-m-d', strtotime($this->invoicedate)),
            'status'=>$this->status,
            'total'=>$this->total,
            'user'=>new PrivateUserResource($this->user)
            
        ];
    }
}
