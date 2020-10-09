<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionAndAnswerResource extends JsonResource
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
            'question'=>$this->question->question,
            'answer'=>$this->answer,
            'buyerid'=>$this->question->buyer_id,
            'visibility'=>$this->visibility,
            
         ];
    }
}
