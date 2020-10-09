<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SellerProfileResource extends JsonResource
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
            'seller_name' => $this->seller_name,
            'mobileno'=>$this->mobileno,
            'company_name'=>$this->company_name,
            'company_url'=>$this->company_url,
            'status'=>$this->status,
            'aboutbusiness'=>$this->aboutbusiness,
            'pan_number'=>$this->pan_number,
            'bankaccount_number'=>$this->bankaccount_number,
            'bankaccountdetail'=>$this->bankaccountdetail

        ];
    }
}
