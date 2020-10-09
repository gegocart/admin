<?php

namespace App\Models\Traits;

use App\Cart\Money;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;

trait HasPrice
{
    public function getPriceAttribute($value)
    {
        return new Money($value);
    }

    public function getShippingPriceAttribute($value)
    { 
       return new Money($value);
    }

    public function getSubtotalAttribute($value)
    {
         return new Money($value);
    }

    // public function getTaxRateAttribute($value) //taxrate refers column name
    // {
    //      return new Money($value);
    // }

   
    public function getGrandTotalAttribute($value)
    {
        //dd($value);
        $value=(($this->price->amount()+$this->shippingprice->amount())*$this->quantity);
     
        return new Money($value);
    }

    public function getFormattedPriceAttribute()
    {
      return $this->price->formatted();
    }
    public function getOriginalPriceAttribute($value)
    { 
        
        return $this->price->amount();
    }
}
