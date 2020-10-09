<?php

namespace App\Cart;

use NumberFormatter;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money as BaseMoney;

class Money
{
    protected $money;

    public function __construct($value)
    {
        //$this->money = new BaseMoney($value, new Currency('GBP'));

        $this->money = new BaseMoney($value, new Currency('INR'));
    }

    public function amount()
    {
        return $this->money->getAmount();
    }

    public function currency()
    {
        return $this->money->getCurrency();
    }

    public function formatted()
    {
        // $formatter = new IntlMoneyFormatter(
        //     new NumberFormatter('en_GB', NumberFormatter::CURRENCY),
        //     new ISOCurrencies()
           
        // );
        $formatter = new IntlMoneyFormatter(
            new NumberFormatter('en_IN', NumberFormatter::CURRENCY),
            new ISOCurrencies()
           
        );
         //dd($formatter);
        return $formatter->format($this->money);
    }

  public function getCurrencyCode()
    {
           //dd($this->currency());
            $formatter = new IntlMoneyFormatter(
            new NumberFormatter('en_IN', NumberFormatter::CURRENCY),
            new ISOCurrencies()
           
        );
        $formatter = new NumberFormatter('en_IN', NumberFormatter::CURRENCY);
       // $symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
    //$code = $formatter->getSymbol(NumberFormatter::INTL_CURRENCY_SYMBOL);
     $code = $formatter->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
       //dd();
        return $code;
    }
     

   
    public function getCurrencySymbol()
    {
           //dd($this->currency());
            $formatter = new IntlMoneyFormatter(
            new NumberFormatter('en_IN', NumberFormatter::CURRENCY),
            new ISOCurrencies()
           
        );
        $formatter = new NumberFormatter('en_IN', NumberFormatter::CURRENCY);
       // $symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
         $code = $formatter->getSymbol(NumberFormatter::INTL_CURRENCY_SYMBOL);
           return $code;
    }

     public function formattedtotal()
    {
        $formatter = new IntlMoneyFormatter(
            new NumberFormatter('en_GB', NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $formatter->format($this->total);
    }

    public function add(Money $money)
    {
        $this->money = $this->money->add($money->instance());

        return $this;
    }

    public function instance()
    {
        return $this->money;
    }
}