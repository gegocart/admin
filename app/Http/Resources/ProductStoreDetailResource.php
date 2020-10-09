<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductGalleryResource;
use App\Http\Resources\ProductCategoryResource;


class ProductStoreDetailResource extends JsonResource
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
            'user_id'=>$this->user_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'type'=>$this->type,
            'sku' => $this->sku,
            'price'=>$this->price->formatted(),
            'productgallery' =>  ProductGalleryResource::collection($this->productgallery),
            'user_id'=>$this->users->id,
            'username'=>$this->users->name,
            'tax_id'=>$this->tax_type->id,
            'tax_rate'=>$this->tax_type->tax_rate,
             'category'=>ProductCategoryResource::collection($this->productcategory),
             'store_id'=>$this->stores->id,
             'store_name'=>$this->stores->name,
              
             

                  

           ];
    }
}
