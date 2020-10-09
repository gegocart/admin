<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionAnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);


        return [
             'question'=>$this->question,
             'created_at'=>date('d-M-Y H:i',strtotime($this->created_at)),
             'product_name'=>$this->products->name,
             'product_id'=>$this->products->id,
             'id'=>$this->id,
             'answer_id'=>$this->answer->id,
             'answer'=>$this->answer->answer,
             'visibility'=>$this->answer->visibility,
             'status'=>$this->answer->status,
             'likes'=>$this->answer->likes,
             'dislikes'=>$this->answer->dislikes,
             'approved_by'=>$this->answer->approved_by
        ];
    }
}
