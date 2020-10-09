<?php

namespace App\Http\Resources;

use App\Http\Resources\CountryResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\StateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'name' => $this->name,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'city' => $this->city,
            'state' => $this->state,
            'email' => $this->user->email,
            'mobileno' => $this->mobileno,
            'postal_code' => $this->postal_code,
            'country' => new CountryResource($this->country),
            'default' => $this->default
        ];
    }
}
