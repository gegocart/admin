<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\Stock;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SellerOrderMail;
use Exception;

  use App\Models\Mailtemplate;

trait OrderProcess
{ 
	 public function Orderproduct($product,$order_id,$order,$buyer_id)
	 {
    
        try
        {

         for($i=0;$i<count($product);$i++)
         {
         
         	 $productdetail=[];
          $productdetail['product']['id']=$product[$i]['product']->id;
          $productdetail['product']['user_id']=$product[$i]['product']->user_id;
          $productdetail['product']['store_id']=$product[$i]['product']->store_id;
          $productdetail['product']['name']=$product[$i]['product']->name;
          $productdetail['product']['slug']=$product[$i]['product']->slug;
          $productdetail['product']['description']=$product[$i]['product']->description;
          $productdetail['product']['price']=(float)$product[$i]['product']->price->amount();
          $productdetail['product']['tax_id']=$product[$i]['product']->tax_id;
          $productdetail['product']['status']=$product[$i]['product']->status;
          $productdetail['product']['quantity']=$product[$i]->pivot->quantity;
          $productdetail['product']['type']=$product[$i]['product']->type;
          $productdetail['product']['weight']=$product[$i]['product']->weight;
          $productdetail['product']['approved_by']=$product[$i]->pivot->approved_by;

         
            $productdetail['variation']['id']=$product[$i]->id;
            $productdetail['variation']['name']=$product[$i]->name;
            $productdetail['variation']['product_id']=$product[$i]->product_id;
            $productdetail['variation']['price']=(float)$product[$i]->price->amount();
            $productdetail['variation']['attribute_product_id']=$product[$i]->attribute_product_id;
            $productdetail['variation']['quantity']=$product[$i]->pivot->quantity;
         

          $productdetail['seller']['id']=$product[$i]['product']['users']->id;
          $productdetail['seller']['name']=$product[$i]['product']['users']->name;
          $productdetail['seller']['email']=$product[$i]['product']['users']->email;
        

          for($j=0;$j<count($product[$i]['product']['productgallery']);$j++) {
            $productdetail['productimage'][$j]['id']=$product[$i]['product']['productgallery'][$j]->id;
            $productdetail['productimage'][$j]['product_id']=$product[$i]['product']['productgallery'][$j]->product_id;
            $productdetail['productimage'][$j]['position']=$product[$i]['product']['productgallery'][$j]->position;
            $productdetail['productimage'][$j]['imagepath']=$product[$i]['product']['productgallery'][$j]->imagepath;
            $productdetail['productimage'][$j]['thumbnailimage']=$product[$i]['product']['productgallery'][$j]->thumbnailimage;
          }
          
        

          $productdetail['tax_type']['id']=$product[$i]['product']['tax_type']->id;
          $productdetail['tax_type']['tax_name']=$product[$i]['product']['tax_type']->tax_name;
          $productdetail['tax_type']['country_id']=$product[$i]['product']['tax_type']->country_id;
          $productdetail['tax_type']['country_code']=$product[$i]['product']['tax_type']->country_code;
          $productdetail['tax_type']['tax_rate']=$product[$i]['product']['tax_type']->tax_rate;
          $productdetail['tax_type']['status']=$product[$i]['product']['tax_type']->status;
          $productdetail['tax_type']['order']=$product[$i]['product']['tax_type']->order;


        

          $taxamt=0;
          $productprice=0;
          $shippingprice=0/100;
          $ship_tax=0/100;
        
         $orderitem=new OrderItem();
         $orderitem->order_id=$order_id;
         $orderitem->seller_id=$product[$i]['product']['users']->id;

       
         $orderitem->productdetail=$productdetail;
               
         $orderitem->buyer_id=$buyer_id;
         $orderitem->product_id=$product[$i]['product']->id;
         $orderitem->product_variation_id=$product[$i]->id;
         $orderitem->price=$product[$i]->price->amount()/100;
         $orderitem->quantity=$product[$i]->pivot->quantity;
         $orderitem->tax_id=$product[$i]['product']['tax_type']->id;
         $orderitem->producttaxrate=$product[$i]['product']['tax_type']->tax_rate;
         $orderitem->status='processing';
         if($product[$i]['product']->type!='giftcard'){
          $ship_tax=$product[$i]['product']['tax_type']->tax_rate;
          }
          $orderitem->shippingtaxrate=$ship_tax;
         /*Gift card entry*/
         $orderitem->to_email=$product[$i]->pivot->to_email;
         $orderitem->message=$product[$i]->pivot->message;
         $orderitem->from=$product[$i]->pivot->from_mail;
         $orderitem->card_image=$product[$i]->pivot->card_image;
         /*Gift card entry*/
         if($product[$i]['product']->type!='giftcard'){
         $shippingprice=$order->shippingMethod->price->amount()/100;
         }
         $orderitem->shippingprice=$shippingprice;

         $productprice=($product[$i]->price->amount() * $product[$i]->pivot->quantity)/100;
         
         
         $orderitem->save();
         
         //sellermail
         }
          return $orderitem;
       }
       catch(Exception $e)
       {
          // dump($e->getMessage());
       }
	 }
   public function createOrderTxn($order,$data,$product){
 

       /*   $transaction=Transaction::where('order_id','=',$order->id)->first();

          $transaction->type=$data['type'];
          $transaction->status=$data['status'];
          $transaction->action=$data['action'];
          $transaction->request=$data['request'];
          $transaction->response=$data['response'];
          $transaction->comment=$data['comment'];
          
          $transaction->entity_id=$order->id;
          $transaction->entity_name=get_class($order);
          $transaction->balance_before=$order->overalltotalamount();//$transaction->balance_before;
          $transaction->balance_after=0;
          $transaction->total=$order->overalltotalamount();
          $transaction->save();*/
          
          $array=array();
          $array['order_id']=$order->id;
         
          $orderitem=OrderItem::where('order_id',$order->id)->get();
         
           $accounting_code=NULL;
           
            $count=count($orderitem);
            
           for($i=0;$i<$count;$i++)            
           {

               if($data['action']=='cod')
               {
                
                 //buyer -debit
                 $this->createDebitTransaction($order->user_id,$order->overalltotalamount(),$data['status'],$data['action'],$accounting_code,$data['comment'],$data,NULL, $orderitem[$i]->id,get_class($orderitem[$i]),$array,$order->id);
                  
                  
               }
            
              $stock=Stock::where('product_variation_id',
                            $orderitem[$i]->product_variation_id)->first();
              $stock->quantity=$stock->quantity-$orderitem[$i]->quantity;
              $stock->save();

            

            $mailtemplate = Mailtemplate::where('name','seller_new_order')->first();

            if($mailtemplate->status=='active')
            {
             Mail::to($product[$i]['product']['users']->email)->queue(new SellerOrderMail($order->user)); 
            }      
            


           //sending mail to seller
         //   $products=Product::where('id',$product[$i]['product']->id)->first();
         //   $user=User::where('id',$products->user_id)->first();

         //  // //dump($user);
         // Mail::to($user->email)->queue(new OrderMail($user));

 
      }

   }
}