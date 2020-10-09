<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\InvoiceDetailResource;
use App\Http\Resources\AddressResource;
use App\Http\Resources\ShippingMethodResource;
use App\Http\Resources\PaymentMethodResource;
use App\Http\Resources\ProductEditResource;
use App\Http\Resources\StoreIndexResource;
use App\Http\Resources\OrderProductVariationDetailResource;
use NumberFormatter;
use App\Cart\Money;



class InvoiceResource extends JsonResource
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
            'orderno' => $this->orderno,
            'user_id' => $this->user_id,
            'orderdate'=>date('Y-m-d', strtotime($this->created_at)),
            'address_id' => $this->address_id,
            'shipping_method_id' => $this->shipping_method_id,
            'status' => $this->status,
            'subtotal' => $this->subtotal()->formatted(),
            'payment_method_id' => $this->payment_method_id,
            'invoice'=>InvoiceDetailResource::collection($this->invoice),
            'address'=>new AddressResource($this->address),
            'shipping_method'=>new ShippingMethodResource($this->shippingMethod),
            'payment_method'=>new PaymentMethodResource($this->paymentMethod),
             //'products'=>['productdetail'=>$this->orderitems],
             'product_detail' =>OrderProductVariationDetailResource::collection($this->orderitems),
           //'products'=>$this->products,
             'stores'=>$this->stores,
            'transactions'=>$this->transactions,
            'gift_voucher_amount'=>$this->giftcardorder(),
            'gift_total'=>$this->gifttotal(),
            'currency'=>$this->getCurrency(),
            'numberinwords'=>$this->totalnumberinwords(),
            'overalltotal'=>$this->grandtotal(),


                 
        ];
    }
}
