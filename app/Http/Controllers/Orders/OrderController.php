<?php

namespace App\Http\Controllers\Orders;

use App\Cart\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\GiftcardOrder;
use App\Events\Order\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderProductDetailResource;
use App\Models\OrderDetail;
use App\Models\Orderstatusview;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\OrderStatus;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Query\Builder;
use App\Mail\GiftcardOrderMail;
use App\Mail\GiftVoucherMail;
use App\Mail\OrderMail;
use App\Mail\SellerOrderMail;
use App\Mail\ShipmentMail;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Traits\TransactionProcess;
use App\Traits\AddresscheckItemSizecheck;
use App\Traits\SellerBalance;
use App\Traits\OrderProcess;
use App\Traits\Common;
use App\Traits\LogActivity;
use App\Models\Mailtemplate;
use App\Models\Invoice;    
  
class OrderController extends Controller
{
    use OrderProcess,TransactionProcess,SellerBalance,Common,LogActivity,AddresscheckItemSizecheck;
    protected $cart;

    public function __construct()
    {
        $this->middleware(['auth:api']);
        $this->middleware(['cart.sync', 'cart.isnotempty'])->only('store');
    }

    public function index(Request $request)
    {
       $orderdetail=Order::with(['orderitems','paymentMethod','address','orderstatus','giftcardorders'])->where('user_id',Auth::id())->latest()->paginate(10);
                  
      return OrderProductDetailResource::collection($orderdetail);

    }

    public function store(OrderStoreRequest $request, Cart $cart)
    {
     
      $res=[];
       try
       {
        
         \DB::beginTransaction();
        $input = $request->all();

        $order = $this->createOrder($request, $cart);
        $product=$cart->products();
        $order->products()->sync($cart->products()->forSyncing());

         $order_id=$order->id;
         $buyer_id=$request->user()->id;

       $orderitem=$this->Orderproduct($product,$order_id,$order,$buyer_id);
  
        $array=array();
        $array['type']=$request->get('type');
        $array['status']=$request->get('status');
        $array['action']=$request->get('action');
        $array['request']=$request->get('request');
        $array['response']=$request->get('response');
        $array['comment']=$request->get('comment');
       
        event(new OrderCreated($order,$array,$product));
        
        if($order->giftorder_id!=null){
          $giftorder=GiftcardOrder::with('orderitem')->where('id',$order->giftorder_id)->first();
           $card_user=$this->getuser($giftorder->orderitem->buyer_id);

            $mailtemplate = Mailtemplate::where('name','giftvoucher_status')->first();

            if($mailtemplate->status=='active')
            {
               Mail::to($card_user->email)->queue(new GiftVoucherMail($card_user));
            }   
           
        }

         //mail send to buyer
           //$user=User::where('id',$order->user_id)->first();
           $user=$this->getuser($order->user_id);

  
            $mailtemplate = Mailtemplate::where('name','new_order')->first();

            if($mailtemplate->status=='active')
            {
             Mail::to($user->email)->queue(new OrderMail($user)); 
            }


           
    
      \DB::commit();
        try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $orderitem,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_ORDER_ITEM_STORED',
          'Order Item Stored'
        );

     }
    catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }
      return new OrderResource($order);
      }
      catch(Exception $e)
       {
            $res['message']=$e->getMessage();
          // dump($e->getMessage());
            \DB::rollBack();
            return $res;
       }
    }

    public function getuser($userid)
    {
      $user=User::where('id',$userid)->first();
      return $user;

    }

     public function getordertypebyseller($orderid)
    {
  
      $orderItems=OrderItem::where('seller_id',Auth::id())->where('order_id',$orderid)->pluck('status')->toArray();

          $processing=false;
          $shipped=false;
          $completed=false;
          $cancel=false;
          $hold=false;
          $refunded=false;
          $payment_failed=false;

          $typearr=[];
 
           foreach ($orderItems as $item) {
             
             if($item==='processing')
             {
                $processing=true;                
             }
             else if($item==='hold')
             {
                $hold=true;
             }
             // else if($item==='refunded')
             // {
             //     $typearr[]= array('refunded' => ,$item);
             // }
             // else if($item==='cancel')
             // {
             //     $refunded=true;
             // }
             
                     
           }

            $countArr=array_count_values($orderItems);
            $count=count($orderItems);


           if($processing===true && $hold!=true)
           {
              $type='processing';
           }
           else if($hold)
           {
              $type='hold';
           } 
           else if($countArr['cancel']==$count)
           {
              $type='cancel';            
           }
           else if($countArr['payment_failed']==$count)
           {
              $type='payment_failed';            
           }
           else if($countArr['shipped']==$count)
           {
              $type='shipped';            
           }
            else if($countArr['completed']==$count)
           {
              $type='completed';            
           }
            else if($countArr['refunded']==$count)
           {
              $type='refunded';            
           }

         
         return $type;
              

    }

    protected function createOrder(Request $request, Cart $cart)
    {
      if($request->giftorder_id!=null)
      {

          $giftorder=GiftcardOrder::where('id',$request->giftorder_id)->update(['is_used'=>1]);
      }
         
      return $request->user()->orders()->create(
            array_merge($request->only(['address_id', 'shipping_method_id', 'payment_method_id','orderno','giftorder_id']), [
              'subtotal' => $cart->subtotal()->amount()
            ])
      );
    }

    protected function getOrdernumber()
    {
        
        $ordernonew;
        if(count(Order::get())<=0)
        {
           $ordernonew="OR_001";
        }
        else{
          $orderno=Order::orderBy("orderno","DESC")->take(1)->first()->orderno;
          $ordernonew=++$orderno;
        } 
        return response()->json(['success'=>true,'orderno'=>$ordernonew],200);
        
    }

     public function getorderstatus($id)
    {
       $orderstatus=Orderstatusview::where('orderid',$id)->where('sellerid',Auth::id())->first();
       if(is_null($orderstatus))
       {
          return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
         
       }
                         
        return $orderstatus;

    }

    public function getProductType($id)
    {
        $orderitems=OrderItem::where('id',$id)->first();
         

         return [
              'type'=>$orderitems->productdetail['product']['type'],
               ];
    }

     public function generateCoupons($count, $length = 16)
    {
        $coupons = [];
        while(count($coupons) < $count) {
            do {
                $coupon = strtoupper(str_random($length));
            } while (in_array($coupon, $coupons));
            $coupons[] = $coupon;
        }

        $existing = GiftcardOrder::whereIn('code', $coupons)->count();
        if ($existing > 0)
            $coupons += $this->generateCoupons($existing, $length);

        return (count($coupons) == 1) ? $coupons[0] : $coupons;
    }


    public function getOrderCompletionStatus($orderid)
    {
      $boolstatus=false;
      $orderitem=OrderItem::where('order_id',$orderid)->get();
      foreach ($orderitem as $key => $value) {
        if($value->status=='processing'){
           $boolstatus=false;
           break;
        }
        else{
          $boolstatus=true;
          continue;
        }
      }
      return $boolstatus;

    }

    public function createOrderApprove(Request $request)
    {
      
        $res=[];
        try
        {
             $invoice =Invoice::where('order_id','=',$request->order_id)->where('user_id',Auth::id())->get(); //modified 11/07  

            
              if(count($invoice)==0)
              {
               
                throw new Exception("Order is not invoiced,Create Invoice for the order ", 1);
                
              }


            if($request->producttype=='physical')
            {

              $address =Address::where('user_id','=',Auth::id())->get();
              // dd($address);
           
              if(count($address)==0)
              {
               
                throw new Exception("Please Enter the Shipping Address ", 1);
                
              }

              // $invoice =Invoice::where('order_id','=',$request->order_id)->get();               
            
              // if(count($invoice)==0)
              // {
               
              //   throw new Exception("Order is not invoiced,Create Invoice for the order ", 1);
                
              // }


//check shipped 11/07
              $orderProductStatus=OrderItem::whereIn('id',$request->order_item_id)->pluck('status')->toArray();
               

               foreach ($orderProductStatus as $status) {           
                  
                  // if($status!='shipped') 14/8

                    if($status!='shipped' && $status!='cancel' && $status!='refunded')
                  {
                       throw new Exception("Order is not shipped", 1);
                        
                  }
                
               }
                      

            }

    //end        

             $grams;
             $scope;
             $itemsize;
             foreach ($request->order_item_id as $key => $value){
              
                $orderproduct=OrderItem::where('order_id',$request->order_id)->where('id',$value)->first();
     
              if($orderproduct->status!='completed')
              {


                  if($orderproduct->productdetail['product']['type']=='giftcard')
                   {
                    

                      for($i=1;$i<=$orderproduct->quantity;$i++)
                      {
                        $date=date("Y-m-d H:i:s");
                        $giftorder=new GiftcardOrder;
                        $giftorder->order_id=$orderproduct->order_id;
                        $giftorder->item_id=$value;
                        $giftorder->amount=$orderproduct->price;
                        $giftorder->code=$this->generateCoupons(1);
                        $giftorder->expire_on= date('Y-m-d H:i:s', strtotime("+3 months", strtotime($date)));
                        $giftorder->save();

                      }
                    
                   
                         $mailtemplate = Mailtemplate::where('name','gift_order')->first();

                          if($mailtemplate->status=='active')
                          {
                             $emailid=$orderproduct->to_email;
                             $toemail=explode(',', $emailid);
                             for ($i=0;$i<count($toemail); $i++) { 
                              Mail::to($toemail[$i])
                                              ->queue(new GiftcardOrderMail($orderproduct,$value));
                             }
                             
                          }   
                      
                    }
              

                if($orderproduct->status=='shipped' || $orderproduct->productdetail['product']['type']=='giftcard')
               { 
                // dump('hi');
                 $orderproduct->status='completed';//TXN_ACTION_COMPLETED;
                 $orderproduct->save(); 
               }  
              
               // $orderproduct->status= 'completed'; //TXN_ACTION_COMPLETED; 14/8        
               // $orderproduct->save(); 
                 
                 $orderstatus=new OrderStatus();
           // $orderstatus=OrderStatus::find($request->order_id);
                $orderstatus->order_id=$request->order_id;
                $orderstatus->from_status=$request->from_status;
                $orderstatus->to_status='completed'; //TXN_ACTION_COMPLETED;
                $orderstatus->comments=$request->comments;
                $orderstatus->created_by=Auth::id();
                $orderstatus->updated_by=Auth::id();
                $orderstatus->save();



                $id=$request->order_id;
                
                $order=Order::where('id',$request->order_id)->first();
                $user=User::where('id',$order->user_id)->first();

                
                $productid=$orderproduct->product_id;

                $categoryproduct=CategoryProduct::where('product_id',$productid)->first(); 
                $subcategory=Category::where('id',$categoryproduct->category_id)->first();
                $category=Category::where('id',$subcategory->parent_id)->first();

                $percentage=$category->commission_fee;
                $sellingprice=$orderproduct->price * $orderproduct->quantity;   
                $grams=$orderproduct->productdetail['product']['weight'];
                
                $array=array();
              
               $status='completed';//TXN_ACTION_COMPLETED;   
               $order=Order::find($id);

               $scope=$this->checkAddressStatus($orderproduct->seller_id,$orderproduct->buyer_id);
              
               $itemsize=$this->checkItemSize($grams);
             
               $feedetails=$this->feedetails($grams,$itemsize,$scope,$percentage,$sellingprice,$orderproduct->id,Auth::id());

               $adminamount=$feedetails['totalservicefee'];
               $selleramount=$feedetails['sellercredit'];

               $action='';
             
                 if($request->action=='cash on delivery'){
                  $action='cod';
                 }
                 else{
                  $action=$request->action;
                 }
                   //seller -credit
                  $this->createCreditTransaction(Auth::id(),$selleramount,$status,$action,
                  $request->accounting_code,$request->$comments,NULL,NULL,
                  $orderproduct->id,get_class($orderproduct),$array,$id);
                   
                  //admin -debit
                  $this->createDebitTransaction(ADMIN_ID,$adminamount,$status,$action,
                  $request->accounting_code,$request->$comments,NULL,NULL,
                  $orderproduct->id,get_class($orderproduct),$array,$id);
             }

            }
           
           
           $id=$request->order_id; 
            
           if($this->getOrderCompletionStatus($request->order_id)==true)
           {
            
             if($order->giftorder_id!=null){
               $gift_order=GiftcardOrder::find($order->giftorder_id);

               $this->createDebitTransaction($gift_order->orderitem->seller_id,$gift_order->amount,$status,$action,
              $request->accounting_code,$request->$comments,NULL,NULL,
              $orderproduct->id,get_class($orderproduct),$array,$id);
             }

            
             
              $order=Order::find($id);
              $order->status='completed';//TXN_ACTION_COMPLETED;
              $order->save();
           }
            

             
            $res['message']="Saved Successfully";
            return $res;

        }
        catch(Exception $e)
        {
             return response()->json(['success'=>false,'message'=>$e->getMessage()],422);
        }
    }

    

}
