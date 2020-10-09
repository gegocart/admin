<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\Product_VariationsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductStoreResource extends JsonResource
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
            'status' => $this->status,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'storelogo'=>$this->storelogo,
            'storeimage' => $this->storeimage,
            'address'=> $this->address,
           'product' =>  ProductIndexResource::collection($this->products)
          

           ];
    }
}
