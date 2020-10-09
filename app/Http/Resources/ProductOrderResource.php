<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductOrderResource extends JsonResource
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
            'order_product_id' => $this->id,
            'status'=>$this->status,
            'order_id'=>$this->order_id,
            'product_id'=>$this->product_id,
            'product_detail'=>$this->productdetail
            
        ];
        //  return [
        //     'id' => $this->id,
        //     'user_id'=>$this->user_id,
        //     'store_id'=>$this->store_id,
        //     'user'=>$this->users,
        //     'name' => $this->name,
        //     'slug' => $this->slug,
        //     'description' => $this->description
        // ];
    }
}
