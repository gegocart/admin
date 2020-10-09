<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductMinStockResource extends JsonResource
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
            'user_id'=>$this->product->user_id,
            'store_id'=>$this->store_id,
             'name' => $this->product->name,
             'slug' => $this->product->slug,
             'status'=>$this->product->status,
             'stock_count' => $this->stockCount()//->orderby('stock_count','desc'),
        ];
    }
}
