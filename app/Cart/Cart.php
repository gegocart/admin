<?php

namespace App\Cart;

use App\Cart\Money;
use App\Models\ShippingMethod;
use App\Models\User;
use App\Models\TaxType;
use App\Models\Product;
use Exception;


class Cart
{
    protected $user;

    protected $changed = false;

    protected $shipping;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function products()
    {
        return $this->user->cart;
    }

    public function withShipping($shippingId)
    {

        $this->shipping = ShippingMethod::find($shippingId);
        return $this;
    }

    public function add($products)
    {

        $this->user->cart()->syncWithoutDetaching(
            $this->getStorePayload($products)
        );
    }

    public function update($productId, $quantity)
    {
      try
      {
        $this->user->cart()->updateExistingPivot($productId, [
            'quantity' => $quantity
        ]);
      }
      catch(Exception $e)
      {
        //dump($e->getMessage());
      }
        
    }

    public function delete($productId)
    {
        $this->user->cart()->detach($productId);
    }

    public function sync()
    {  
          $this->user->cart->each(function ($product) {
            $quantity = $product->minStock($product->pivot->quantity);
            //$email=$product->pivot->to_email;
           
            if ($quantity != $product->pivot->quantity) {
                $this->changed = true;
            }

           
            $product->pivot->update([
                'quantity' => $quantity
            ]);
        });
    }

    public function hasChanged()
    {
        return $this->changed;
    }

    public function empty()
    {
        $this->user->cart()->detach();
    }

    public function isEmpty()
    {
        return $this->user->cart->sum('pivot.quantity') <= 0;
    }

    public function cardDesign()
    {
      //$image=array();
      
     /* for($i=0;$i<count($this->user->cart);$i++){
        if($this->user->cart[$i]['pivot']['card_design']==NULL)
        {
          $image[]="productimage";
        }
        else{
           $image[]=GiftcardImage::where('id',$this->user->cart[$i]['pivot']['card_design'])->first();

        }
     
    }*/
    $card_details=array();
   for($i=0;$i<count($this->user->cart);$i++){
        
          $card_details[]=$this->user->cart[$i]['pivot'];

        }
       return $card_details;
    }

   public function card_image()
   {
    $image=array();
      
     for($i=0;$i<count($this->user->cart);$i++){
        if($this->user->cart[$i]['pivot']['card_image']==NULL)
        {
          $image[]=$this->user->cart[$i]['pivot']['card_image'];
        }
        else{
           $image[]=Product::where('id',$this->user->cart[$i]['pivot']['card_image'])->first();

        }
     
    }
     return $image;
   }

    public function subtotal()
    {
           //if two product selected overtotal is calculated with quantity
         $subtotal = $this->user->cart->sum(function ($product) {
            return ($product->price->amount() * $product->pivot->quantity);
        });
       // $taxrate=(integer)$this->itemtaxrate()->amount();
        return new Money($subtotal);
        
        // $subtotal = $this->user->cart->sum(function ($product) {
        //     //changed on may 29
        //    if($product->price->amount()==="0"){
        //     return $product->product->price->amount() * $product->pivot->quantity;
        //     }
        //     else{
        //       return $product->price->amount() * $product->pivot->quantity;
        //     }
            
        // });

       // return new Money($subtotal);
    }
    public function getCurrency()
    { 
       return $this->subtotal()->getCurrencyCode();
    }

    public function subtotal_shipping()
    {
      $price=0;
      $rate=0;
      $shippingprice=0;
      $total=0;
           //if two product selected overtotal is calculated with quantity
          if ($this->shipping) {
             $subtotal = $this->user->cart->sum(function ($product) {
              if($product->product->type!="giftcard"){
                return ($this->shipping->price->amount() *$product->pivot->quantity);
              }
              return 0;
            });
          }

         // $taxrate=(integer)$this->itemtaxrate()->amount();
         // $shippingtaxrate=(integer)$this->shippingtaxrate()->amount();
         //return new Money($subtotal + $taxrate +$shippingtaxrate);
         return new Money($subtotal);
    }

    public function totalold()
    {
       if ($this->shipping) {
            return $this->subtotal()->add($this->shipping->price);
        }
         
        return $this->subtotal();
    }

    public function total()
    {
        $taxrate=(integer)$this->itemtaxrate()->amount();
        //dd($taxrate);//144
         $total=0;
         $grandtotal=0;
         $total=$this->subtotal()->amount() + $taxrate;
         $shipping=0;
         $shippingrate=0;
         if($this->shipping){
           $grandtotal=$total + $this->subtotal_shipping()->amount() + $this->shippingtaxrate()->amount();
         }
         else{
           $grandtotal=$total;
         }
        
         
               //  if ($this->shipping) {

        //   $shipping = $this->user->cart->sum(function ($product) {
        //      $shippingprice=($this->shipping->price->amount() * $product->pivot->quantity);
        //      return $this->subtotal_shipping()->add($this->shipping->price);
        //     //return $this->subtotal_shipping()->amount() + $shippingprice;
        //   });
        // }
        return $grandtotal;
        //return new Money($grandtotal);
    }

    public function itemtaxrate()
    {     
           //if two product selected overtotal is calculated with quantity
         $itemtaxrate = $this->user->cart->sum(function ($product) {
            $taxid=$product->product->tax_id;
            $taxtype=TaxType::where('id',$taxid)->first();
            $taxrate=$taxtype->tax_rate/100;
            $price=($product->price->amount()/100 * $product->pivot->quantity)* $taxrate;
           
           return $price *100;
        });
        
        $itemrate=round($itemtaxrate,2);
        return new Money((integer)$itemrate);
    } 

  // public function itemtaxrate()
  //   {     
  //          //if two product selected overtotal is calculated with quantity
  //        $itemtaxrate = $this->user->cart->sum(function ($product) {
  //           $taxid=$product->product->tax_id;
  //           $taxtype=TaxType::where('id',$taxid)->first();
  //           $taxrate=$taxtype->tax_rate/100;
  //           $price=($product->price->amount()/100 * $product->pivot->quantity)* $taxrate;
           
  //          return $price *100;
  //       });
  //       $itemrate=round($itemtaxrate,2);
  //       return new Money((integer)$itemrate);
  //   } 

      

    public function taxrate()
    {     
           //if two product selected overtotal is calculated with quantity
         $taxrate = $this->user->cart->sum(function ($product) {
            $taxid=$product->product->tax_id;
            $taxtype=TaxType::where('id',$taxid)->first();
            $taxrate=$taxtype->tax_rate; 
            return $taxrate;
        });
          
        return $taxrate;
       
    }

    public function shippingtaxrate()
    {     
        $shippingrate=0;
        $rate=0;
        $taxrate=0;
    
          
           $shippingrate = $this->user->cart->sum(function ($product) {
              if($product->product->type!="giftcard"){
            if ($this->shipping ) {
                $taxid=$product->product->tax_id;
                $taxtype=TaxType::where('id',$taxid)->first();
                $taxrate=$taxtype->tax_rate; 
                $rate=($this->shipping->price->amount() *$product->pivot->quantity) * $taxrate/100;
                $shippingrate = $rate; //*100; 
            }
          }
            // else{
            // $shippingrate=($this->shipping->price->amount() * $product->pivot->quantity)* $this->taxrate()/100;
            // }
             return $shippingrate;
        });

        

        return new Money((integer)$shippingrate);
    } 

    public function shippingtotal()
    {     
         $shippingtotal=0;
         $rate=0;
        

         $shippingtotal = $this->user->cart->sum(function ($product) {
           if($product->product->type!="giftcard"){
            if ($this->shipping) {
                $rate=($this->shipping->price->amount() *$product->pivot->quantity);
                $shippingtotal = $rate; //*100; 
            }
            else{
            $shippingtotal=($this->shipping->price * $product->pivot->quantity);
            }
          }
             return $shippingtotal;
        });
       
         return new Money((integer)$shippingtotal);
    } 

    protected function getStorePayload($products)
    {
      try
      {
        return collect($products)->keyBy('id')->map(function ($product) {
         
           return [
                'quantity' => $product['quantity'] + $this->getCurrentQuantity($product['id']),
                'to_email'=>$product['to_email'],
                'from_mail'=>$product['from_mail'],
                'message'=>$product['message'],
                'card_image'=>$product['card_image']
            ];
         })->toArray();
      }
      catch(Exception $e)
      {
        //dump($e->getMessage());
      }

    }

   
    protected function getCurrentQuantity($productId)
    {

        if ($product = $this->user->cart->where('id', $productId)->first()) {
            return $product->pivot->quantity;
        }
      
        return 0;
    }

}
