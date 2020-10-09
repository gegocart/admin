<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\OrderViewResource;
use Auth;

class OrderSearchStatusController extends Controller
{

   
    public function show()
    {
        $orderdetail=OrderDetail::where('seller_id',Auth::id())
                           // ->selectRaw('orderno,orderid,order_product_id,
                           //  seller_id,productname,productslug,
                           //  storename,purchased_on,status,billname,billaddress,billcity,
                           //  billpostcode,mobileno,state,country_id,country,paymentmethod
                           //  ,shippingmethod,quantity')
                           // ->groupBy('orderno','order_product_id')
                           ->orderBy("orderno","DESC")
                          ->paginate(10);


       return $orderdetail;
       
    }

    public function getstatusinvoice($orderid)
    {
      
        $orderinvoice=Order::with('invoice')->where('id',$orderid)->first();
       if(is_null($orderinvoice))
       {
          return response()->json(['success'=>false,'message'=>'Unprocessable Entity'],422);
         
       }
       // $orderinvoice[0]['invoice'][0]->user;
        return $orderinvoice;

    }

    public function getOrderbypaytm($paymentid,$orderid)
    {
       $order=Order::with('user')->where([['user_id',Auth::id()],['payment_method_id',$paymentid],
      ['id',$orderid]])->where('status','processing')->get();
       return OrderViewResource::collection(
            $order
        );
    }

	public function getOrderdetailview($id)
    {
       $orderdetail=OrderDetail::where('orderid',$id)->where('seller_id',Auth::id())->get();
      
       return OrderDetailResource::collection($orderdetail);
      // return $orderdetail;
    }


    public function showstatusfilter($status)
    {
       
        $orderdetail=OrderDetail::where('seller_id',Auth::id())->where('status',$status)->paginate(5);
        return $orderdetail;
    }

     public function searchOrder(Request $request)
    {
      // dd($request->search);
       $res=[];

       try
       {
           // dd($searchquery);
       $search =(string)$request->search;
      
           $orderdetail=OrderDetail::where('seller_id',Auth::id());
         if($search!="" || $search!=null)
         {


           $searchresult=$orderdetail->where(function($query) use($search){
                    $query->orWhere('orderno','LIKE',$search)
                    ->orWhere('productname','LIKE','%'.$search.'%')
                    ->orWhere('storename','LIKE','%'.$search.'%')
                    ->orWhere('billname','LIKE','%'.$search.'%')
                    ->orWhere('status','LIKE',$search);
              });
          

         }
         
          $orderdetail=$orderdetail->paginate(5);

          //dd($orderdetail);
          return $orderdetail;
         
         
       }
       catch(Exception $e){

         // dd($e->getMessage());
         $res['message']=$e->getMessage();
         return $res;
       }

    }

    
}
