<?php

namespace App\Models\Traits;

use App\Cart\Money;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use NumberFormatter;

trait HasTotal
{
    public function getTotalAttribute($value)
    {
        return new Money($value);
    }

    public function getFormattedTotalAttribute()
    { 
       
        return $this->total->formatted();
    }
    public function getOriginalTotalAttribute($value)
    {
       
        return $this->total->amount();
    }
}
