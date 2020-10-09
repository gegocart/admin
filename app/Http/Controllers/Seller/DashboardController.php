<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\RatingReview;
use App\Models\OrderDetail;
use App\Models\Store;
use App\Models\Product;
use App\Models\Stock;
use App\Models\ProductVariation;
use App\Models\Transaction;
use Auth;
use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductMinStockResource;
use Carbon\Carbon;

class DashboardController extends Controller
{


   public function productcount(Request $request)
    {

      $product = Product::where('user_id',Auth::id());

      $duration=$request->duration==null ? '30' :$request->duration;

      $date = Carbon::today()->subDays($duration);

      $product = $product->where('created_at','>=', $date);

      return $product->count();

    }

     public function storecount(Request $request)
    {

       $storecount=Store::where('user_id',Auth::id());

       $duration=$request->duration==null ? '30' :$request->duration;

       $date = Carbon::today()->subDays($duration);

       $storecount = $storecount->where('created_at','>=', $date);

       return $storecount->count();
    }

    public function orderamount(Request $request)
    {

       $duration=$request->duration==null ? '30' :$request->duration;

       $date = Carbon::today()->subDays($duration);

       $orderamount=Order::where('user_id',Auth::id())->where('status','completed')->where('created_at','>=', $date)->sum('subtotal');

       return ($orderamount/100);


       // $orderamount=Order::where('user_id',Auth::id())->pluck('subtotal');
        // dd($orderamount);
         // return $orderamount;
    }

     public function ordercount(Request $request)
    {

       $duration=$request->duration==null ? '30' :$request->duration;
       $date = Carbon::today()->subDays($duration);

        $res=[];
        $order=OrderDetail::where('created_at','>=', $date)->where('seller_id',Auth::id())->distinct('orderid')->count('orderid');

        $ordercompleted=OrderDetail::where('created_at','>=', $date)->where('seller_id',Auth::id())->where('status','completed')
        ->distinct('orderid')->count('orderid');
        $orderprocessing=OrderDetail::where('created_at','>=', $date)->where('seller_id',Auth::id())->where('status','processing')
                                                        ->distinct('orderid')->count('orderid');
        $ordercancel=OrderDetail::where('created_at','>=', $date)->where('seller_id',Auth::id())->where('status','cancel')
                                                  ->distinct('orderid')->count('orderid');

     // $orderitem=OrderItem::where('seller_id',$sellerid)->distinct('order_id')->count('order_id');

   /*
       $orderdetail=OrderDetail::where('orderid',$id)->where('seller_id',Auth::id())->count();

return $ordercount;*/

      // $ordercount=Order::withCount(['orderitems'=>function($q)use($sellerid){
      //     $q->where('seller_id',$sellerid);
      //   }])->get();



        // $duration=$request->duration;

           // if($duration!=0)
           // {
           //   $date = Carbon::today()->subDays($duration);
        // $order=OrderDetail::where('seller_id',Auth::id())->distinct('orderid')->where('created_at','>=', $date)->count('orderid');

        // $ordercompleted=OrderDetail::where('seller_id',Auth::id())->where('status','completed')
        // ->distinct('orderid')->where('created_at','>=', $date)->count('orderid');
        // $orderprocessing=OrderDetail::where('seller_id',Auth::id())->where('status','processing')
        //                                                 ->distinct('orderid')->where('created_at','>=', $date)->count('orderid');
        // $ordercancel=OrderDetail::where('seller_id',Auth::id())->where('status','cancel')
        //                                           ->distinct('orderid')->where('created_at','>=', $date)->count('orderid');

           // }


        $transactionamount = Transaction::where('user_id',Auth::id())->where('status','completed')->get();
        $res['ordercount']=$order;
        $res['ordercompleted']=$ordercompleted;
        $res['orderprocessing']=$orderprocessing;
        $res['ordercancel']=$ordercancel;
        $res['transactionamount']=round($transactionamount->sum('amount'),2);
      return $res;
    }
    /*  public function storecount()
    {
        $res=[];
        $order=OrderDetail::where('seller_id',$sellerid)->distinct('orderid')->count('orderid');
        $ordercompleted=OrderDetail::where('seller_id',$sellerid)->where('status','completed')
        ->distinct('orderid')->count('orderid');
        $orderprocessing=OrderDetail::where('seller_id',$sellerid)->where('status','processing')
                                                        ->distinct('orderid')->count('orderid');
        $ordercancel=OrderDetail::where('seller_id',$sellerid)->where('status','cancel')
                                                  ->distinct('orderid')->count('orderid');
     // $orderitem=OrderItem::where('seller_id',$sellerid)->distinct('order_id')->count('order_id');


     $storecount=Store::where('user_id',Auth::id())->count();

return $storecount;
    }*/

    public function pendingorders()
    {
     $pendingorders=Order::where('status','!=','completed')->where('user_id',$sellerid)->count();
     return $pendingorders;
    }

     public function activeproducts()
    {
       $activeproducts = Product::with(['variations.stock'])->where('user_id',Auth::id())
                                  ->where('status','1')->get();

      //  $activeproducts=ProductVariation::with('stock')->where('productvariation.stock',3)->get();
      // return $activeproducts;
       return ProductIndexResource::collection(
                $activeproducts
            );

    }

    public function inactiveproducts($sellerid)
    {
     $inactiveproducts=Product::where('user_id',$sellerid)->where('status','!=','1')->count();
     return $inactiveproducts;
    }
    public function rating()
    {
        $product=Product::where('user_id',Auth::id())->pluck('id')->toarray();
        $rating=RatingReview::whereIn('entity_id',$product)->sum('rating');
        $count=RatingReview::whereIn('entity_id',$product)->count();
        $avg=$rating/$count;
     return $avg;
    }


    public function orderstatus()
    {


        $orderdetail=OrderDetail::where('seller_id',Auth::id())
                              ->orderBy("orderno","DESC")->take(6)->get();
        return $orderdetail;
    }

    public function ordercompleted()
    {

        $orderdetail=OrderDetail::where('seller_id',Auth::id())->where('status','completed')->count();

        return $orderdetail;
    }

    public function orderprocessing()
    {

        $orderdetail=OrderDetail::where('seller_id',Auth::id())
                              ->where('status','processing')->count();
        return $orderdetail;
    }

    public function ordercancel()
    {

        $orderdetail=OrderDetail::where('seller_id',Auth::id())
                              ->where('status','cancel')->count();
        return $orderdetail;
    }

    public function stock_lowest($sellerid)
    {
        $product=ProductVariation::get();

        $stock=Stock::get();
        return $stock;
    }

    public function getsellerBalance()
    {
       $transaction = Transaction::where('user_id',Auth::id())->where('status','completed')->latest();
     //  dd($transaction->balance_after);

       return $transaction->balance_after;
    }

    public function sellerBalanceDetail()
    {
          $transaction=Transaction::with('order','orderitem')->where('user_id',3)->get();
          return $transaction;
    }


  }
