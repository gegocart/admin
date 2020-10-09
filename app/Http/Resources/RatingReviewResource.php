<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class RatingReviewResource extends JsonResource
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
            'entity_id' => $this->entity_id,
            'entity_name' => $this->entity_name,
            'product_name'=>$this->product->name,
            'user_id' => $this->user_id,
            'user'=>new UserResource($this->user),
            'description' => $this->description,
            'title' => $this->title,
            'rating' => $this->rating,
            'customer_name' => $this->customer_name,
           // 'ratingtotal'=>$this->ratetotal(),
            'created_at' => date('Y-m-d', strtotime($this->created_at)),
                'product_image'=>url('/uploads/'.$this->product->productgallery[0]->imagepath),
         
        ];
    }
}
