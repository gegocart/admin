<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
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
            'gateway_name' => $this->gateway_name,
            'card_type' => $this->card_type,
            'last_four' => $this->last_four,
            'is_active' => $this->is_active,
        ];
    }
}
