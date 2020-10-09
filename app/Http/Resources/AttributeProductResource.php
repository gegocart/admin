<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeProductResource extends JsonResource
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
            'product_id' => $this->product_id,
            'attribute_id' => $this->attribute_id,
            'attribute_value'=>$this->attribute_value,
            'attribute_label'=>$this->attribute->attribute_label,
            'input_type'=>$this->attribute->input_type,
            'variation'=>$this->attribute->variation,
            'required'=>$this->attribute->required
            
        ];
    }
}
