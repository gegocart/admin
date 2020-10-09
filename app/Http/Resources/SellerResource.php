<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SellerProfileResource;
use App\Http\Resources\AddressResource;
use App\Http\Resources\ProductEditResource;
use App\Http\Resources\StoreIndexResource;
use App\Http\Resources\RatingReviewResource;

class SellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this->myproducts->lastPage);
        return [
            'id'=>$this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image'=>$this->image,
            'sellerprofile'=>new SellerProfileResource($this->sellerprofile),
            'address'=>new AddressResource($this->defaultaddress),
            'stores'=>StoreIndexResource::collection($this->mystores),
            'products'=>ProductEditResource::collection($this->myproducts),
           

        ];
    }
}
