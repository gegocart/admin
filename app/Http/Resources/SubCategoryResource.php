<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryAttributeresource;

class SubCategoryResource extends JsonResource
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
            'categoryattribute'=> CategoryAttributeresource::collection($this->attributesetcategory),
            'attributesetcount'=>$this->attributesetcategorycount()
            
        ];
    }
}
