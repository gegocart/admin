<?php

namespace App\Http\Resources;

use App\Http\Resources\ShippingMethodResource;
use App\Http\Resources\PaymentMethodResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'orderno'=>$this->orderno,
            'status' => $this->status,
            'created_at' => date('d-M-Y', strtotime($this->created_at)),
            'subtotal' => $this->subtotal->formatted(),
            'total' => $this->total()->formatted(),
            'products' => ProductVariationResource::collection(
                $this->whenLoaded('products')
            ),
            'address' => new AddressResource(
                $this->whenLoaded('address')
            ),
            'shippingMethod' => new ShippingMethodResource(
                $this->whenLoaded('shippingMethod')
            ),
            'paymentMethod'=>new PaymentMethodResource(
                $this->whenLoaded('paymentMethod')
            ),
          'shippingtaxamount'=>$this->shippingpricegst(),
          'shippingtotal'=>$this->shippingpricetotal(),
           'taxrate'=>$this->taxratevalue(),
          'taxamount'=>$this->productprice_taxamt(),
          'overalltotal'=>$this->overalltotalamount(),
           'currency'=>$this->getCurrency(),
          // 'price'=>$this->actualprice()->formatted()
            //'actualprice'=>$this->actualprice()->formatted(),
        ];
    }
}
