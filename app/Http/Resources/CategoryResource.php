<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryAttributeresource;

class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'parent_id'=>$this->parent_id,
            'commission_fee'=>$this->commission_fee,
            'children' => CategoryResource::collection($this->whenLoaded('children')),
            'categoryattribute'=>new CategoryAttributeresource($this->attribute_set_id),
            'count'=>$this->subcount(),
            'productsCount'=>$this->productsCount(),
            
            
        ];
    }
}
