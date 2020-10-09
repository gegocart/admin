<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryShippingResource extends JsonResource
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
            'country_id' => $this->country_id,
            'country_name' => $this->country->name,
            'shipping_method_id' => $this->shipping_method_id,
            'shipping_name'=>$this->shippingmethod->name
        ];
    }
}
