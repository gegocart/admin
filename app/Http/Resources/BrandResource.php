<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CategoryProduct;

class BrandResource extends JsonResource
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
           'name'=>$this->brand,
           'count'=>$this->porductCountByBrand(),
           'storecount'=>$this->storePorductCountByBrand(),
           'categorycount'=>$this->count,

        ];
    }
}
