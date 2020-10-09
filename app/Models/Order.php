<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\PaymentMethod;
use App\Models\Store;
use App\Models\Transaction;
use App\Models\Traits\HasTotal;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Order extends Model
{
    use SoftDeletes;
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const PAYMENT_FAILED = 'payment_failed';
    const COMPLETED = 'completed';
    const REFUNDED = 'refunded';

    use HasTotal,HasPrice;

    protected $fillable = [
        'orderno',
        'status',
        'address_id',
        'shipping_method_id',
        'payment_method_id',
        'giftorder_id',
        'subtotal'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->status = self::PENDING;
        });
    }

    // public function getSubtotalAttribute($subtotal)
    // {
    //     return new Money($subtotal);
    // }

    public function total()
    {
      if($this->shippingMethod!=null){
        return $this->subtotal->add($this->shippingMethod->price);
        }
        else
        {
          return $this->subtotal;
        }
    }

    public function subtotal()
    {
        return $this->subtotal;
    }

    public function totalvalue()
    {
      if($this->shippingMethod!=null){
      return ($this->subtotal->amount() +  $this->shippingMethod->price->amount());
    }
    return 0;
    }
    
    public function totalPriceAmount()
    {
      if($this->shippingMethod!=null){
      return ($this->subtotal->amount() +  $this->shippingMethod->price->amount())/100;
    }
    return 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
  
    public function products()
    {
        return $this->belongsToMany(ProductVariation::class, 'product_variation_order')
            ->withPivot(['quantity'])
            ->withTimestamps();
    }
    
    public function stores()
    {
      return $this->belongsTo('App\Models\Orderproductstores','id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function orderstatus()
    {
        return $this->hasMany('App\Models\OrderStatus','order_id','id');
    }


    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice','order_id','id');
    }
    public function giftcardorders()
    {
        return $this->hasMany('App\Models\GiftcardOrder','order_id','id');
    }

    public function actualprice()
    {
        $actualprice=0;
                 
        foreach ($this->products as $key => $value) {
           $actualprice=$value->price->amount() * $value->pivot->quantity;
        }
        return new Money($actualprice);
    }


    public function taxratevalue()
    {
        $taxrate=0;
             // dd($this->orderproduct[0]-);
        foreach ($this->products as $key => $value) {
            if($taxrate==0){
              $taxrate =$value->product->tax_type->tax_rate;
            }
            else{
              $taxrate +=$value->product->tax_type->tax_rate;
            }
          
        }

        return $taxrate;
    }

    public function taxamountprice()
    {
        $taxrate=0;
        $actualprice=0;
        $taxamount=0;
         
        //foreach ($this->products as $key => $value) {
        $taxamount=$this->products->sum(function ($product) {
           $actualprice=($product->price->amount() * $product->pivot->quantity)/100;
           $taxamount =(float)(($product->product->tax_type->tax_rate/100) *$actualprice);
           //$taxvalue=$taxamount*100;
           return $taxamount * 100;
        });

       return new Money($taxamount);
    }

    public function numberinwords()
    {
       $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
       $amountinwords=$digit->format($this->totalvalue());
       return $amountinwords;

    }

    public function shippingpricegst()
    {
         // $price=$this->shippingMethod->price->amount()/100;
         // $taxamount =(float)(($this->taxratevalue()/100) *$price);
         //$taxvalue=$taxamount*100;
        $taxamount=0;
        $actualprice=0;
        $taxamount=$this->products->sum(function ($product) {
           if($product->product->type!="giftcard"){
          $actualprice=($this->shippingMethod->price->amount() * $product->pivot->quantity)/100;
           
          $taxamount =(float)(($product->product->tax_type->tax_rate/100) *$actualprice);
          }
          return $taxamount;
        });

        
         return round($taxamount,2); //previous return money
    }


    public function shippingpricetotal()
    {
         $taxvalue=0;
         $actualprice=0;
       

        $actualprice=$this->products->sum(function ($product) {
           if($product->product->type!="giftcard"){
          $actualprice=($this->shippingMethod->price->amount() * $product->pivot->quantity)/100;
        }
            
         // $taxamount =(float)(($product->product->tax_type->tax_rate/100) *$actualprice);

          return $actualprice;
        });

         return sprintf('%0.2f', $actualprice); //previous return money
    }

    public function overalltaxamount()
    {
        //$shippingprice= $this->shippingpricegst()->amount()/100;
        $shippingprice= $this->shippingpricegst();
        $price=$this->taxamountprice()->amount()/100;
        $total=($price + $shippingprice) * 100;
        return new Money($total);
    }

    public function overalltotalpricetax_amount()
    {
         $taxamount=$this->overalltaxamount()->amount()/100;
         $shippingprice =$this->shippingMethod->price->amount()/100;
         $price=$this->actualprice()->amount()/100;
         $total=($price + $shippingprice + $taxamount) * 100;
         return new Money($total);
    }

    public function productprice_taxamt()
    {
          $taxvalue=0;
         $actualprice=0;
        $taxamount=0;

        $taxamount=$this->products->sum(function ($product) {
          $actualprice=($product->price->amount() * $product->pivot->quantity)/100;
            
          $taxamount =(float)(($product->product->tax_type->tax_rate/100) *$actualprice);

          return $taxamount;
        });
      
        // foreach ($this->products as $key => $value) {
        //   if($actualprice==0){
        //      $actualprice=($value->price->amount() * $value->pivot->quantity)/100;
            
        //      $taxamount =(float)(($value->product->tax_type->tax_rate/100) *$actualprice);
        //     } 
        //     else{

        //     }          

        // }
       
         return round($taxamount, 2);
    }

    public function overalltotalamount()
    {
         $taxshippingprice= $this->shippingpricegst();

         $taxprice=$this->productprice_taxamt();
         $shippingprice =$this->shippingpricetotal(); //$this->shippingMethod->price->amount()/100;
         $price=$this->subtotal->amount()/100;

         $total=($price + $shippingprice + $taxprice + $taxshippingprice);
      if($this->giftorder_id!=null)
      {
        $total=$total-$this->giftcardorder()->amount;
      }
         //dd(sprintf('%0.2f', $total));
         return sprintf('%0.2f', $total);
    }
     public function giftcardorder()
    {
        if($this->giftorder_id!=null)
      {
        $giftorder=GiftcardOrder::GetOrder($this->giftorder_id)->first();

         return $giftorder;
      }
      return 0;
     

    }

    public function gifttotal()
    {
      $total=$this->orderitems->sum(function ($orderitem) {
          $grandtotal=$orderitem->grandtotal;
          return $grandtotal;
        });
      return sprintf('%0.2f', $total);

    }


    public function grandtotal()
    {
      $total=$this->orderitems->sum(function ($orderitem) {
          $grandtotal=$orderitem->grandtotal;
          return $grandtotal;
        });
       if($this->giftorder_id!=null)
      {
        $total=$total-$this->giftcardorder()->amount;
      }
      return sprintf('%0.2f', $total);
    }
    
    public function totalnumberinwords()
    {
       $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
       $amountinwords;
       
       $amountinwords=$digit->format($this->grandtotal());
             
       return $amountinwords;

    }

    public function getCurrency()
    { 
       return $this->actualprice()->getCurrencyCode();
    }

    public function orderitems()
    {
      return $this->hasMany('App\Models\OrderItem','order_id','id');
    }
 
    
    public function scopeStatus($query,$status)
    {
      $query->where('status',$status);
    }

    public function cnorderitems()
    {
      return $this->hasMany('App\Models\OrderItem','order_id','id')->where('seller_id',3)->count();
    }

    
 

  
}
