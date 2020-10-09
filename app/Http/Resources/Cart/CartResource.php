<?php

namespace App\Http\Resources\Cart;

use App\Http\Resources\Cart\CartProductVariationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //dd($this->cart->all());
        return [
            'products' => CartProductVariationResource::collection($this->cart)
        ];
    }
}
