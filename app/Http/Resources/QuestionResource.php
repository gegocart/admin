<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
//use App\Http\Resources\CategoryAttributeresource;

class QuestionResource extends JsonResource
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
            'product_id' => $this->product_id,
            'buyer_id' => $this->buyer_id,
            'seller_id' => $this->seller_id,
            'question' => $this->question,
            'product_name'=>optional($this->products->name),  
             
        ];
    }
}
