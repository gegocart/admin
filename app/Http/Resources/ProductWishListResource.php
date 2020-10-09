<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductWishListResource extends JsonResource
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
                    //'user_id'=>$this->user_id,
                    //'store_id'=>$this->store_id,
                    'wishlistname'=>$this->name,
                    'slug'=>$this->slug,
                    //'sku'=>$this->sku,
                    'description'=>$this->description,
                    'product_image'=>$this->product_image,
                    // 'thumbnailimage'=>$this->thumbnailimage,
                    'price'=>$this->price,
                    //'tax_id'=>$this->tax_id,
                    'status'=>$this->status,
        ];
    }
}
