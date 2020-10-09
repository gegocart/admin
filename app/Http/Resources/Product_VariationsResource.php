<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product_VariationsResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->formattedPrice,
            'price_varies' => $this->priceVaries(),
            'type' => $this->attributeproduct->attribute->attribute_label,
            'input_type' => $this->type->input_type,
            'in_stock' => $this->inStock(),
             //'currency'=>$this->getCurrency(),
            //'type' => $this->type->name, previous
        ];
    }
}
