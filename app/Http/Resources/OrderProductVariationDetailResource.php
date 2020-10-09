<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductOrderResource;

class OrderProductVariationDetailResource extends JsonResource
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
            
            'products'=>$this->productdetail,
            'shippingprice'=>$this->shippingpricetotal,
            'shippingtaxprice'=>$this->shippingtax,
            'shippingtaxtotal'=>$this->shippingtotal,
             'subtotal'=>$this->subtotal,
             'quantity'=>$this->itemquantity,
             'itemtax'=>$this->itemtaxtotal,
             'itemtotal'=>$this->itemtotal,
             'grandtotal'=>$this->grandtotal,
             'shippingtaxrate'=>$this->shippingtaxrate,
            //product_status'=>$this->status,
        ];
    }
}
