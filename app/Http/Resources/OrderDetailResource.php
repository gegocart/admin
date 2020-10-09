<?php

namespace App\Http\Resources;

use App\Http\Resources\ShippingMethodResource;
use App\Http\Resources\PaymentMethodResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Input;



class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      // dd($this->subtotal());
      // dd($this->grandtotal()->formatted());
        return [
            'seller_id' => $this->seller_id,
            'orderid'=>$this->orderid,
            'order_product_id'=>$this->order_item_id,
            'to_email'=>$this->to_email,
            'from'=>$this->fromaddress,
            'cardname'=>$this->card_name,
            'product_type'=>$this->product_type,
            'orderno'=>$this->orderno,
            'productname'=>$this->productname,  
            'status' => $this->status,
            'purchased_on' => $this->purchased_on,
             'storename'=>$this->storename,
            'price'=>$this->productprice()->formatted(),
            'pricevalue'=>$this->actualprice(),
            'shippingprice'=>$this->shippingprice()->formatted(),
            'tax_id'=>$this->tax_id,
            'taxrate'=>$this->taxrate,
            'taxamount'=>$this->taxrate()->formatted(),
            'total' => $this->grandtotal()->formatted(),
            'totalvalue'=>$this->grandtotalvalue(),
            'subtotal'=>$this->productsubtotal(), //->formatted(),
            'billname' => $this->billname,
            'billaddress'=>$this->billaddress,
            'billcity'=>$this->billcity,
            'cityname'=>$this->cityname,
            'billpostcode'=>$this->billpostcode,
            'billmobileno'=>$this->mobileno,
            'billstate'=>$this->state,
            'statename'=>$this->statename,
            'country'=>$this->country,
            'shippingmethod'=>$this->shippingmethod,
            'paymentmethod'=>$this->paymentmethod,
            'currencycode'=>$this->productprice()->getCurrencySymbol(),
            'currency'=>$this->productprice()->getCurrencyCode(),
            'thumbnailimage'=>$this->thumbnailimage,
            'quantity'=> $this->quantity,
            'variationid'=>$this->variationid,
            'variationname'=>$this->variationname,
            'transaction_id'=>$this->transaction_id,
             'shippingtaxamount'=>$this->shippingpricegst()->formatted(),
             'pricetaxamt'=>$this->price_taxamount()->formatted(),
             'shipping_taxamt'=>$this->shippingprice_taxamount()->formatted(),
             'overalltotalamount'=>$this->overalltotalpricetax_amount()->formatted(),
             'overalltaxtotal'=>$this->overalltaxamount()->formatted(),
             'numberinwords'=>$this->numberinwords(),
             'shippingpricetotal'=>$this->shippingpricevalue(),
             'taxtotal'=>$this->totaltax(),
            
        ];
    }
}
