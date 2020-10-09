<?php

namespace App\Http\Controllers\Admin\Seller;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\OrderStatus;
use Auth;

class OrderController extends Controller
{

   public function updateStatus(Request $request,$id)
    { 

       \DB::beginTransaction();
     try{
          
           // $orderItem=OrderItem::where('id',$id)->update(['status' => $request->status]);
       
         $orderItem=OrderItem::where('id',$id)->first();
           
         $orderItemUpdate=OrderItem::where([
                                            'id'=>$id,
                                           'order_id'=>$orderItem->order_id,
                                           'seller_id'=>$orderItem->seller_id,
                                           ])->update(['status' => $request->status]);
          


         
           
          $orderItems=OrderItem::where('order_id',$orderItem->order_id)->get();
       
          $processing=false;
          $shipped=false;
          $completed=false;
          $cancel=false;
          foreach ($orderItems as $item) {
               
               if($item->status=='processing')
               {
                  $processing=true;
                  break;
               }
               elseif($item->status=='shipped')
               {
                  $shipped=true;
                  
               }
               elseif($item->status=='cancel')
               {
                 $cancel=true;
               }



         }



         // dd($processing,$shipped);

          $order=Order::where('id',$orderItem->order_id)->first();
           $oldstatus=$order->status;

         if($processing || ($shipped && $processing))
         {
           $order->status='processing';
          
         }
         // elseif($shipped && $processing)
         // {
         //    // dd('processing');
         //    $order->status='processing';
         //   $order->save();

         // }
         elseif($shipped && $processing==false)
         {
            // dd('shipped');
            $order->status='shipped';
         }
         elseif($shipped==false && $processing==false)
         {
            // dd('completed');
          
          $itemsStatus=OrderItem::where('order_id',$orderItem->order_id)->pluck('status')->toArray();
          $countArr=array_count_values($itemsStatus);
          
          if(count($itemsStatus)==$countArr['cancel'])
          {
             $order->status='cancel';

          }
          else
          {
            $order->status='completed';
          }
           
         }

           $order->save();
            
             $orderStatus=OrderStatus::where('order_id',$order->id)->first();

             if(count($orderStatus)>0)
             {
                 $orderStatus=OrderStatus::where('order_id',$order->id)
                         ->update([
                            'from_status' => $oldstatus,
                            'to_status'=>$order->status,
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
        
   

        \DB::commit();
            
             $response['messages']="Status updated Successfully";

   // try{
    //     $ip = $this->getRequestIP();
    //     $this->doActivityLog(                                    
    //       $order,
    //       Auth::user(),
    //       ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
    //       'LOGNAME_ORDER_STATUS_CHANGE',
    //       'Order Status Change'
    //     );

    //  }
    // catch(Exception $e)
    //       {
             
    //       //dd($e->getMessage());
    //       }
            return $response;

          }
          catch(Exception $e)
          {
            \DB::rollBack();
            dd($e->getMessage());
          }  
    
           
        }
    


     public function orders($userid,Request $request)
    {

        $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;

         $preuser=User::PreUser($userid,3)->first();
         $nextuser=User::NextUser($userid,3)->first();

         $user=User::with('defaultAddress')->where('id',$userid)->first();
         
         $orderItems=OrderItem::with('order')->where('seller_id',$userid);
          
        $search=$request->search;
       if($search!="")
        {

           $orderItems=$orderItems->where(function($query) use ($search){
             $query->orWhere('id',$search)->orWhere('status',$search)
             ->orwhereHas('order',function($q) use($search){

                     $q->Where(function($query1) use ($search){

                        $query1->orwhereHas('paymentMethod',function($q1) use($search){
                             $q1->Where('gateway_name','LIKE',$search.'%');

                        })->orwhereHas('shippingMethod',function($q3) use($search){
                             $q3->Where('name','LIKE',$search.'%');
                        
                        })->orwhereHas('address',function($q2) use ($search){
                             $q2->Where('address_1','LIKE',$search.'%');

                         });
                    });
                 });          
           });
          // dd( $orderItems->get());
        }

        $orderItems=$orderItems->orderby('id',$orderby)->paginate($paginate);
             $orderItems=$orderItems->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
         
      
        return view('admin.seller.order',[
             'orderItems'=>$orderItems,
             'user'=>$user,
             'paginate_old'=>$paginate,
             'orderby'=>$orderby,
             'preuser'=>$preuser,
             'nextuser'=>$nextuser,
        ])->withQuery($paginate);       
    }


     public function delOrder($id)
    {
        
         \DB::beginTransaction();
     try{
          
           OrderItem::where('id',$id)->delete();
           // Transaction::where('order_id',$id)->delete();
           // OrderStatus::where('order_id',$id)->delete();
           // Invoice::where('order_id',$id)->delete();
            // Order::where('id',$id)->delete();

           \DB::commit();
            return redirect()->back()->with(['success'=>'Successfully deleted']);
             
        }
    catch(Exception $e)
          {
            \DB::rollBack();
            // dd($e->getMessage());
          }  
    }
}
