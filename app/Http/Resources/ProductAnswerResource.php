<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductAnswerResource extends JsonResource
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
            'question_id' => $this->question_id,
            'answer' => $this->answer,
            'visibility' => $this->visibility,
            'status' => $this->status,
            'likes'=>$this->likes,
            'dislikes'=>$this->dislikes,
        ];
    }
}
