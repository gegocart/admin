<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class StoreIndexResource extends JsonResource
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
            'user_id'=>$this->user_id,
            'name'=>$this->name,
            'slug'=>$this->slug,
            'status'=>$this->status,
            'description'=>$this->description,
            'keywords'=>$this->keywords,
            'storelogo'=>$this->storelogo,
            'storeimage'=>$this->storeimage,
            'sliceString'=>Str::limit($this->description, 60, ' ...'),
        ];
    }
}
