<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductQuestionResource extends JsonResource
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
            'seller_id' => $this->seller_id,
            'buyer_id' => $this->buyer_id,
            'question' => $this->question,
            'thumbnailimage'=>$this->thumbnailimage,
        ];
    }
}
