<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\OrderStatus;
use Auth;
use App\Models\OrderDetail;
use App\Models\User;
use Mail;
use App\Mail\ShipmentMail;
use App\Mail\OrderCancelBuyerMail;
use App\Mail\OrderCancelSellerMail;
use App\Models\Mailtemplate;
use App\Http\Resources\OrderStatusResource;
use App\Models\Address;
use App\Models\Invoice;
use Exception;
 class OrderStatusUpdateController extends Controller
{
     public function cancelOrderItem(Request $request)
    {
       
       $orderItem=OrderItem::where('order_id',$request->order_id)->where('seller_id',Auth::id())
                ->update([
                     'status'=>'cancel',
                ]); 
 
      // $orderItem=OrderItem::with('user','sellerUser')->where('order_id',$request->orderitemid)->first();
      // $orderItem->status='cancel';
      // $orderItem->save();

        $itemsStatus=OrderItem::where('order_id',$request->order_id)->pluck('status')->toArray();
     
        $countArr=array_count_values($itemsStatus);
             
          if(count($itemsStatus)==$countArr['cancel'])
          {
             $order=Order::where('id',$request->order_id)->first();
             $oldstatus=$order->status;
             $order->status='cancel';
             $order->save();
               
              $orderStatus=OrderStatus::where('order_id',$order->id)->first();



             if(count($orderStatus)>0)
             {
	             $orderStatus=OrderStatus::where('order_id',$order->id)
	              ->update([
	              'from_status' => $oldstatus,
	              'to_status'=>$order->status,
	              'comments'=>$request->comments,
	              'updated_by'=>Auth::id(),
	              ]);	
             }
             else
             {

                $orderstatus=new OrderStatus();
                $orderstatus->order_id=$order->id;
                $orderstatus->from_status=$oldstatus;
                $orderstatus->to_status=$order->status;
                $orderstatus->comments=$request->comments;
                $orderstatus->created_by=Auth::id();
                $orderstatus->updated_by=Auth::id();
                $orderstatus->save();
             }

              
          }

        
          // $mailtemplate = Mailtemplate::where('name','cancel_item_seller')->first();
             
          //   if($mailtemplate->status=='active')
          //   {

          //      Mail::to($orderItem->sellerUser->email)->queue(new OrderCancelSellerMail($request->orderitemid,$orderItem->sellerUser->name)); 
          //   }

          //   $mailtemplate = Mailtemplate::where('name','cancel_item_buyer')->first();
             
          //   if($mailtemplate->status=='active')
          //   {
          //      Mail::to($orderItem->user->email)->queue(new OrderCancelBuyerMail($request->orderitemid,$orderItem->user->name)); 
          //   }



        $res['message']="Saved Successfully";
            return $res;

    }

    public function storeorderstatus(Request $request)  //shipped,hold ->status only change
    {


        $res=[];
        try
        {
             
            if($request->producttype=='physical')
            {
               if($request->to_status=='shipped')
               {
                 $address =Address::where('user_id','=',Auth::id())->get();
           
                    if(count($address)==0)
                    {
                     
                      throw new Exception("Please Enter the Shipping Address ", 1);
                      
                    }

                    // $invoice =Invoice::where('order_id','=',$request->order_id)->get();

                    $invoice =Invoice::where('order_id','=',$request->order_id)->where('user_id',Auth::id())->get(); //modified 11/07  
                  
                    if(count($invoice)==0)
                    {
                     
                      throw new Exception("Order is not invoiced,Create Invoice for the order ", 1);
                      
                    }


               }
              

            }


               $orderItem=OrderItem::where('order_id',$request->order_id)->where('seller_id',Auth::id())->where('status','processing')->pluck('id')->toArray();
                               
            // foreach ($request->order_item_id as $key => $value) { 14/8

            foreach ($orderItem as $key => $value) {

                $orderproduct=OrderItem::where('order_id',$request->order_id)
                                 ->where('id',$value)->first();
                $orderproduct->status=$request->to_status;
                $orderproduct->save(); 
                
               
                 
                $orderstatus=new OrderStatus();
                $orderstatus->order_id=$request->order_id;
                $orderstatus->from_status=$request->from_status;
                $orderstatus->to_status=$request->to_status;
                $orderstatus->comments=$request->comments;
                $orderstatus->created_by=Auth::id();
                $orderstatus->updated_by=Auth::id();
                $orderstatus->save();

                $id=$request->order_id;
         
           if($request->to_status=='shipped'){
            $order=Order::where('id',$request->order_id)->first();
              $user=User::where('id',$order->user_id)->first();

            $mailtemplate = Mailtemplate::where('name','order_shipment')->first();

            if($mailtemplate->status=='active')
            {
               Mail::to($user->email)->queue(new ShipmentMail($user)); 
            }
           }
            
               
                
             if($this->getOrderCompletionStatus($request->order_id,$request->to_status)==true)
             {
                $order=Order::find($id);
                $order->status=$request->to_status;
                $order->save();
              }
                                      
                                             
            }
       

            $res['message']="Saved Successfully";
            return $res;

        }
        catch(Exception $e)
        {
            //dump($e->getMessage());
            $res['message']=$e->getMessage();
            return $res;
        }

    }

     public function getOrderCompletionStatus($orderid,$status)
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

    public function viewOrderStatus($orderid)
    {
       $orderstatus=OrderItem::with('order')->where('seller_id',Auth::id())
                                        ->where('order_id',$orderid)->get();

       return OrderStatusResource::collection($orderstatus);
    }
}
