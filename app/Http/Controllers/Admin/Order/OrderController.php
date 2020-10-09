<?php

namespace App\Http\Controllers\Admin\Order;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\OrderStatus;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Resources\OrderListResource;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use App\Models\ActivityLog;
use Exception;
     
class OrderController extends Controller
{use Common,LogActivity;
   
     public function update(Request $request,$id)
    {

          // $orderItem=OrderItem::where('order_id',$id)->update(['status' => $request->status]);
       \DB::beginTransaction();
     try{

         $order=Order::where('id',$id)->first();
         $order->status=$request->status;
         $order->save();

       
            $orderItem=OrderItem::where('order_id',$id)->update(['status' => $request->status]);
                
         $orderStatus=OrderStatus::where('order_id',$id)
         ->update([
            'from_status' => $request->oldstatus,
            'to_status'=>$request->status,
        ]);
   

        \DB::commit();
            
             $response['messages']="Status updated Successfully";

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
            return $response;
           
        }
    catch(Exception $e)
          {
            \DB::rollBack();
            dd($e->getMessage());
          }  
    }

  
   public function create($slug)
   {
          return view('admin.order.list',[
             'orderlist'=>$slug,
          ]);
   }

   public function getData(Request $request,$slug)
   {
       
        $paginate=$request->paginate == null ?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;
        $orders=Order::with('address','shippingMethod','paymentMethod')->Status($slug);
        $search=$request->search;
    
        if($search!="")
        {
             $orders=$orders->where(function($query) use($search){
                $query->orWhere('orderno','LIKE',$search)->orWhere('status','LIKE',$search)
                ->orwhereHas('address',function($q) use($search){
                         $q->Where('address_1','LIKE','%'.$search.'%');
                 })->orwhereHas('shippingMethod',function($q) use($search){
                         $q->Where('name','LIKE',$search.'%');
                 })->orwhereHas('paymentMethod',function($q) use($search){
                         $q->Where('gateway_name','LIKE',$search.'%');
                 });
            });
 
        }
            $orders=$orders->orderby('id',$orderby)->paginate($paginate);
         
        return OrderListResource::collection($orders);
   }

 


    public function destroy($id)
    {
    //      \DB::beginTransaction();
    //  try{
          
    //        OrderItem::where('order_id',$id)->delete();
    //        Transaction::where('order_id',$id)->delete();
    //        OrderStatus::where('order_id',$id)->delete();
    //        Invoice::where('order_id',$id)->delete();
    //        Order::where('id',$id)->delete();

    //        \DB::commit();
    //         return redirect()->back()->with(['success'=>'Successfully deleted']);
             
    //     }
    // catch(Exception $e)
    //       {
    //         \DB::rollBack();
    //         dd($e->getMessage());
    //       }
    }
}
