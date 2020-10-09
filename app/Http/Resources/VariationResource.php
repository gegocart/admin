<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VariationResource extends JsonResource
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
            'product_id'=>$this->product_id,
            'name' => $this->name,
            'price' => $this->price->amount()/100,
            'price_varies' => $this->priceVaries(),
            'in_stock' => $this->inStock(),
            'stockcount'=>$this->stockCount(),
            'attribute_value' => $this->attributeproduct->attribute_value,
            'input_type' => $this->attributeproduct->attribute->input_type,
            'attribute_product_id'=>$this->attributeproduct->id
        ];
    }
}
