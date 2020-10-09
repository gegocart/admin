<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\Traits\HasTotal;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;


class OrderDetail extends Model
{
	use HasTotal,HasPrice;

    protected $table="orderdetailview";

    protected $appends=['total_value'];

    public function productprice()
    {
        $price=($this->productprice*$this->quantity);
        return new Money($price);
    }

    public function shippingprice() //refers has price attrtibutes shipping price
    {
        return $this->shippingprice;
    }

    public function actualprice()
    {
        return (($this->productprice*$this->quantity))/100;
    }


    public function productsubtotal() 
    {
        return $this->productsubtotal;
    }

    public function taxrate()
    {
         $price=$this->actualprice();
         $taxamount =(float)(($this->taxrate/100) *$price);
         $taxvalue=$taxamount*100;
         return new Money($taxvalue);
    }


    public function grandtotal()
    {
        
        $grandtotal;
        
        if($this->shippingmethod!="")
        { 
          $grandtotal=($this->productsubtotal + (float)$this->shippingprice->amount());
                //+$this->taxrate()->amount()) ;
        }
        else
        {
            $grandtotal=$this->productsubtotal; //+ $this->taxrate()->amount();
        }

     	 return new Money($grandtotal);
    }

    public function grandtotalvalue()
    {
        $price=$this->price_taxamount()->amount()/100;
         $shippingprice =$this->shippingprice_taxamount()->amount()/100;
         $total=($price + $shippingprice);
         return $total;
        // $grandtotalvalue;
        // $price=$this->actualprice();
        // $taxamount =(float)(($this->taxrate/100) *$price);
        // if($this->shippingmethod!="")
        // { 
            
        //     $grandtotalvalue=($this->productsubtotal + (float)$this->shippingprice->amount())/100  + $taxamount;
                                                     
            
        // }
        // else
        // {
        //     $grandtotalvalue=$this->productsubtotal/100 + $taxamount;
        // }

        //  return $grandtotalvalue;
    }

    public function getTotalValueAttribute()
    {
         $price=$this->price_taxamount()->amount()/100;
         $shippingprice =$this->shippingprice_taxamount()->amount()/100;
         $total=($price + $shippingprice);
         return $total;
    }
   
    public function gtotal()
    {
      	$total=(($this->productprice->amount() + $this->shippingprice->amount())*($this->quantity));
      	return $total;
    }
    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

 

    public function shippingpricegst()
    {
         $price=$this->shippingprice->amount()*$this->quantity/100;
         $taxamount =(float)(($this->taxrate/100) *$price);
         $taxvalue=$taxamount*100;
         return new Money($taxvalue);
    }


    public function price_taxamount()
    {
         $price=$this->actualprice();
         $taxamount =(float)(($this->taxrate/100) *$price);
         $total = ($price + $taxamount)*100;
         return new Money($total);

    }

    public function shippingprice_taxamount()
    {
         $price=$this->shippingprice->amount()*$this->quantity/100;
         $taxamount =(float)(($this->taxrate/100) *$price);
          $total = ($price + $taxamount)*100;
         return new Money($total);
    }

    public function overalltotalpricetax_amount()
    {
         $price=$this->price_taxamount()->amount()/100;
         $shippingprice =$this->shippingprice_taxamount()->amount()/100;
         $total=($price + $shippingprice) * 100;
         return new Money($total);
    }

    public function overalltaxamount()
    {
        $shippingprice= $this->shippingpricegst()->amount()/100;
        $price=$this->taxrate()->amount()/100;
        $total=($price + $shippingprice) * 100;
        return new Money($total);
    }


    public function numberinwords()
    {
       $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
       $amountinwords=$digit->format($this->overalltotalpricetax_amount()->amount()/100);
       return $amountinwords;

    }

    public function shippingpricevalue()
    {
      $shippingprice=0;  
      $shippingprice=($this->shippingprice->amount() *$this->quantity)/100;
      return sprintf('%0.2f', $shippingprice);
    }

    public function totaltax()
    {
        $shippingprice= $this->shippingpricegst()->amount()/100;
        $price=$this->taxrate()->amount()/100;
        $total=($price + $shippingprice);
       
        return sprintf('%0.2f', $total);

    }

}
