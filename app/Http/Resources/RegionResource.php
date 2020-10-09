<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
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
            'regionname' => $this->regionname,
            'country_id'=>$this->countries->id,
            'countryname' => $this->countries->name,
            'statename'=>$this->state_name,
            'cityname'=>$this->city_name,
            'status'=>$this->status,
            'state_count'=>$this->state_count,
            'city_count'=>$this->city_count
        ];
    }
}
