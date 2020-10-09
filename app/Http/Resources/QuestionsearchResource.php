<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return[
            
             'question'=>$this->question,
             'created_at'=>date('d-M-Y H:i',strtotime($this->created_at)),
             'product_name'=>$this->products->name,
             'product_id'=>$this->products->id,
             'id'=>$this->id,
         ];
    }
}
