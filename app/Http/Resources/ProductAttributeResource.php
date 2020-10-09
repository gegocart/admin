<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttributeResource extends JsonResource
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
            'product_name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'product_Image' => $this->product_Image,
             'product_id'=>$this->product_id,
             'attribute_set_id'=>$this->attribute_set_id,
             'attribute_value'=>$this->attribute_value,
        ];
    }
}
