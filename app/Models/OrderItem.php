<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NumberFormatter;
use App\Cart\Money;
use Illuminate\Support\Str;
class OrderItem extends Model
{
     use SoftDeletes;
    protected $table="order_item";
    protected $with=['giftcardproduct'];

     protected $fillable = ['order_id','seller_id','buyer_id','product_id','product_variation_id',
     'price','quantity','tax_id','tax_rate','subtotal','shippingprice','totaltaxamount'
     ,'total','productdetail'];

     protected $appends=['shipping_tax','sub_total','item_quantity','item_taxtotal','grandtotal' ,'shippingprice_total','currency'];

     protected $casts = [
        'productdetail' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
     public function giftcardproduct()
    {
        return $this->belongsTo('App\Models\Product','card_image');
    }
    
    public function giftcardorders()
    {
        return $this->hasMany('App\Models\GiftcardOrder','item_id','id');
    }

    public function used()
    {
      return  $this->giftcardorders()->where('is_used',1)->count();

    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','buyer_id');

    }
    public function sellerUser()
    {
        return $this->belongsTo('App\Models\User','seller_id');

    }

    //  public function invoice()
    // {
    //  return $this->hasOne('App\Models\Invoice','order_product_id');
    // }
   
    public function getItemQuantityAttribute()
    {
        return $this->quantity;
    }

    // public function getShippingTaxAttribute()
    // {
    //     return $this->shippingtaxrate;
    // }

    public function getShippingPriceTotalAttribute()
    {
      return $this->shippingprice * $this->quantity;
    }
    public function getShippingTaxAttribute()
    {
        //dd(($this->shippingpricetotal * $this->shippingtaxrate)/100);
      return ($this->shippingpricetotal * $this->shippingtaxrate)/100;
       
    }

    public function getShippingTotalAttribute()
    {
        $total=$this->shippingpricetotal + $this->shippingtax;
        return sprintf('%0.2f', $total);
    }

    public function getSubTotalAttribute()
    {
        return ($this->price) * $this->quantity;
    }

    public function getItemTaxTotalAttribute()
    {
       $total=($this->subtotal * $this->producttaxrate)/100;
       return sprintf('%0.2f', $total);
    }

    public function getItemTotalAttribute()
    {
        $total=$this->subtotal + $this->itemtaxtotal;
        return sprintf('%0.2f', $total);
    }

    public function getGrandTotalAttribute()
    {
       $total=$this->subtotal+ $this->item_taxtotal + $this->shippingpricetotal + $this->shippingtax;
       return sprintf('%0.2f', $total);
    }


    public function getCurrencyAttribute()
    { 
       return new Money($this->price);
    }

    public function sortDescription($str)
    {
        return Str::limit($str, 60, ' ...');
    }
    

    

 
}
