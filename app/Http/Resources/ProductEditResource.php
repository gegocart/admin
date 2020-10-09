<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductGalleryResource;
use App\Http\Resources\Product_VariationsResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\StoreIndexResource;
use Illuminate\Support\Facades\Input;

class ProductEditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       

       $reviewtotal=$this->ratereviewtotal();
        $reviewcount=$this->ratereviewcount();
        $averagecount=0;
        if($reviewtotal!=0 && $reviewcount!=0){
          $averagecount=round(($reviewtotal/$reviewcount),0);
        }
          return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->OriginalPrice,
            'formattedprice' => $this->formattedPrice,
            'weight'=> $this->weight,
            'tax_id'=>$this->tax_id,
            'type'=>$this->type,
            'sku'=>$this->sku,
            'status'=>$this->status,
            'rate'=>$averagecount,
            'productgallery' => ProductGalleryResource::collection($this->productgallery),
            'productvariations'=> Product_VariationsResource::collection($this->variations),
            'category'=>CategoryResource::collection($this->categories),
            'storedetail'=>new StoreIndexResource($this->stores),
            'brandname'=>$this->brand,
            //'attributeproduct'=>
         ];
    }
}
