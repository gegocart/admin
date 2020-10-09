<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ShippingMethodResource;
use App\Http\Resources\PaymentMethodResource;
use App\Http\Resources\ProductOrderResource;
use App\Http\Resources\OrderProductVariationDetailResource;
use App\Http\Resources\GiftorderResource;

class OrderProductDetailResource extends JsonResource
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
             'productstatus'=>['product'=>$this->orderitems->groupBy('seller_id')],
             'count'=>['product'=>count($this->orderitems->groupBy('seller_id'))],
            //'product_detail' =>OrderProductVariationDetailResource::collection($this->orderproduct),
            'address' => new AddressResource(
                $this->whenLoaded('address')
            ),
            'shippingMethod' => new ShippingMethodResource(
                $this->whenLoaded('shippingMethod')
            ),
            'paymentMethod'=>new PaymentMethodResource(
                $this->whenLoaded('paymentMethod')
            ),
            'giftcardorders'=>new GiftorderResource(
                $this->whenLoaded('giftcardorders')
            ),
          'shippingtaxamount'=>$this->shippingpricegst(),
          'shippingtotal'=>$this->shippingpricetotal(),
           'taxrate'=>$this->taxratevalue(),
          // 'taxamount'=>$this->productprice_taxamt(),
          // 'overalltotal'=>$this->overalltotalamount(),
           'taxamount'=>$this->overalltaxamount()->formatted(),// $this->orderproduct[0]->totaltaxamount,
          'overalltotal'=>$this->grandtotal(),
          'gift_total'=>$this->gifttotal(),
          'giftamount'=>$this->giftcardorder(),
           'currency'=>$this->getCurrency(),
          // 'price'=>$this->actualprice()->formatted()
            //'actualprice'=>$this->actualprice()->formatted(),
        ];
    }
}
