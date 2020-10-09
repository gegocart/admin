<?php

namespace App\Http\Resources\Cart;

use App\Cart\Money;
use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductVariationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartProductVariationResource extends ProductVariationResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
        return array_merge(parent::toArray($request), [
            'product' => new ProductIndexResource($this->product),
            'quantity' => $this->pivot->quantity,
            'total' => $this->getTotal()->formatted(),
        ]);
    }

    protected function getTotal()
    {
        if($this->price->amount()==="0") {
        return new Money($this->pivot->quantity * $this->product->price->amount());
        }
        else{
          return new Money($this->pivot->quantity * $this->price->amount());//varition price
        }
    }
}
