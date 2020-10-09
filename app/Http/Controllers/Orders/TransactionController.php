<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\ProductVariation;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderItem;
use App\Traits\TransactionProcess;
use App\Traits\SellerBalance;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Fee;
use App\Models\User;
use App\Traits\Common;
use App\Traits\LogActivity;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Traits\AddresscheckItemSizecheck;
 
 
class TransactionController extends Controller
{  use Common,LogActivity;
    use TransactionProcess,SellerBalance,AddresscheckItemSizecheck;

    public function storerefund(Request $request) //
    {
    	try
        {
          
    	//refund means we are refund the amt to buyer  seller through paytm means we transfer to buyer account.cod->
          \DB::beginTransaction();
            $orderid=$request->refundchk_orderid;
          
            $grams;
             $scope;
             $itemsize;
             // foreach ($request->chkorderitemid as $key => $value)
             foreach ($request->chkstock as $key => $value)
             {
            // $order=Order::where('id',$orderid)->first();
                $orderproduct=OrderItem::where('order_id',$orderid)->where('id',$value)->first();
                $orderproduct->status=$request->to_status;
                $orderproduct->save(); 
                 
                 $orderstatus=new OrderStatus();
                 $orderstatus->order_id=$orderid;
                 $orderstatus->from_status=$request->from_status;
                 $orderstatus->to_status=$request->to_status;
                 $orderstatus->comments=$request->comments;
                 $orderstatus->created_by=Auth::id();
                 $orderstatus->updated_by=Auth::id();
                 $orderstatus->save();

                
                $order=Order::where('id',$orderid)->first();
                $user=User::where('id',$order->user_id)->first();

                
                $productid=$orderproduct->product_id;

                $categoryproduct=CategoryProduct::where('product_id',$productid)->first(); 
                $subcategory=Category::where('id',$categoryproduct->category_id)->first();
                $category=Category::where('id',$subcategory->parent_id)->first();

                $percentage=$category->commission_fee;
                $sellingprice=$orderproduct->price * $orderproduct->quantity;   
                $grams=$orderproduct->productdetail['product']['weight'];
                
                $array=array();
              
               $status=$request->to_status;

               $order=Order::find($orderid);

               $scope=$this->checkAddressStatus($orderproduct->seller_id,$orderproduct->buyer_id);
              
               $itemsize=$this->checkItemSize($grams);
             
               $feedetails=$this->feedetails($grams,$itemsize,$scope,$percentage,$sellingprice,$orderproduct->id,Auth::id());

               $adminamount=$feedetails['totalservicefee'];
               $selleramount=$feedetails['sellercredit'];
             
               $action='';
             
                 if($request->action=='cod'){
                  $action='cod';
                 }
                 else{
                  $action=$request->action;
                 }
                 //buyer -credit
                  $buyerid=$orderproduct->buyer_id;
                  
                  $this->createCreditTransaction($buyerid,$selleramount,$status,$action,
                  $request->accounting_code,$request->$comments,NULL,NULL,
                  $orderproduct->id,get_class($orderproduct),$array,$orderid);
                   
                   //seller -debit
                  $this->createDebitTransaction(Auth::id(),$adminamount,$status,$action,
                  $request->accounting_code,$request->$comments,NULL,NULL,
                  $orderproduct->id,get_class($orderproduct),$array,$orderid);

                  // if($request->chkstock===true)
                  // {
                    $stock=Stock::where('product_variation_id',$orderproduct->product_variation_id)->first();
                   

                   foreach ($request->quantity as $check)
                  {

                     if($value==$check['itemid'])
                     {
                        $stock->quantity=($stock->quantity + $check['quantity']);
                     }
                  }
                   
                    $stock->save();
                  //}

            }
            
           
         
            // $totalservicefee=Fee::where('entity_id',$value)->where('action','totalservicefee')->value('fee');
            // $sellercredit=Fee::where('entity_id',$value)->where('action','sellercredit')->value('fee');
           
            // $status=$request->status;
            // $action=$request->action;

            // $selleramount=0;
            // $adminamount=$totalservicefee + $sellercredit;
           
            //     //credit -buyer-credit withdraw
            // $buyerid=$orderitem->buyer_id;
            //   $this->createCreditTransaction($buyerid,$adminamount,$status,$action,
            //   $request->accounting_code,$request->$comments,NULL,NULL,
            //   $orderid,get_class($order),$array,$orderid);
               
            //   //seller -debit
            //   $this->createDebitTransaction(Auth::id(),$selleramount,$status,$action,
            //   $request->accounting_code,$request->$comments,NULL,NULL,
            //   $orderid,get_class($order),$array,$orderid);
        
        

           if($this->getOrderRefundStatus($orderid,$request->to_status)==true)
             {
                $order=Order::find($orderid);
                $order->status=$request->to_status;
                $order->save();
              }
 \DB::commit();
            
         try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $order,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_ORDER_STATUS_CHANGE',
          'Order Status Change'
        );

     }
    catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }
             return response()->json(['success'=>true,'message'=>'Successfully ' . $request->to_status],200);
        }
        catch(Exception $e)
        {
              \DB::rollBack();
              //dump($e->getMessage());
           return response()->json(['success'=>false,'message'=>$e->getMessage()],422);
        }

    }

     public function getOrderRefundStatus($orderid,$status)
    {
      $boolstatus=false;
      $orderitem=OrderItem::where('order_id',$orderid)->get();
      foreach ($orderitem as $key => $value) {

        if($value->status==$status){
            $boolstatus=true;
            continue;
        }
        else{
          $boolstatus=false;
          break;
        }
      }
      return $boolstatus;

    }
}
