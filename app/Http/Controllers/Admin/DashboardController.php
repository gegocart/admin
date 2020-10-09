<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Advertise;
use App\Models\Scam;
use App\Models\Review;
use App\Models\SiteFee;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Cart\Money;
use Illuminate\Support\Facades\Input;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Traits\HasPrice;

class DashboardController extends Controller
{
    use HasPrice;

    public function index(Request $request)
    { 

    	  $orders = Order::get()->count();
    	  $completed=Order::Status('completed')->count();
    	  $Processing=Order::Status('processing')->count();

    	  $shipped=Order::Status('shipped')->count();
        $totalpayment=Order::sum('subtotal')/100;

        $topOrderItems=Product::where('ratings',5)->limit(10)->get();
       
        $sellerid=Product::where('ratings',5)->pluck('user_id')->toArray();
        
      
        // get top buyer depend by max of order items

      $topBuyers=[];
        $buyersid=OrderItem::groupby('buyer_id')->selectRaw('buyer_id,count(buyer_id) as count')->orderby('count','desc')->pluck('buyer_id')->toArray();
 
        if(count($buyersid)>0)
        {
         $topBuyers=User::where('usergroup_id',4)->whereIn('id',$buyersid)->take(10)->get();         
        }

        


        // $buyersid=OrderItem::groupby('buyer_id')->pluck('buyer_id')->toArray();


        // $buyerscount=User::whereIn('id',$buyersid)->get()->map(function($user){
        //   return [
        //           'count'=>$user->buyerItemCount(),
        //           'id'=>$user->id,
        //   ];
        // });


        // $sortdesc=$buyerscount->sortByDesc(function ($buyerscount, $key) {
        //       return $buyerscount['count'];
        // });

        // $userid=$sortdesc->take(10)->pluck('id');

        // $topBuyers=User::where('usergroup_id',4)->whereIn('id',$userid)->get();


        $topSellers=User::where('usergroup_id',3)->whereIn('id',$sellerid)->limit(10)->get();

        $totalpayment=new Money((int)$totalpayment);
          
         return view('admin.dashboard.index',[
         	'orders'=>$orders,
         	'completed'=>$completed,
         	'processing'=>$Processing,
         	'shipped'=>$shipped,
          'totalpayment'=>$totalpayment->formatted(),
          'topOrderItems'=>$topOrderItems,
          'topBuyers'=>$topBuyers,
          'topSellers'=>$topSellers,

         ]);
    }
    
     
   public function getOrders(Request $request)
   {
   	  // dd($request->duration);
   		$duration=$request->duration==null ? '30' :$request->duration;
          
  
          $lastdate = Carbon::today()->subDays($duration)->toDateString();           
          $previousdate = Carbon::today()->subDays($duration*2)->toDateString();

               
           $lastOrders = Order::where('created_at','>=', $lastdate)->count();
           $previousOrders=Order::whereBetween('created_at', [$previousdate,$lastdate])->count();

        // dd($lastdate);
          
           if($previousOrders!=0 && $lastOrders)
          {
             $result=($lastOrders/$previousOrders)*100;  
          }
          else
          {
            $result=$previousOrders==0?$lastOrders*100:$previousOrders*100;
          }
 

          $range=$result>=100?'high':'low';
        


         
           return [
           		'orders'=>$lastOrders,
             'percentage'=>(float)number_format($result, 2, '.', ''),
                 'range'=>$range,
           ];
   }

    public function getbuyer(Request $request)
   {
   	   // dd($request->duration);
   		$duration =$request->duration==null ? '30' :$request->duration;

           // $date = Carbon::today()->subDays($duration);

           $lastdate = Carbon::today()->subDays($duration)->toDateString();
           $previousdate = Carbon::today()->subDays($duration*2)->toDateString();
           
           $lastBuyers = user::ByUserType(4)->where('created_at', '>=', $lastdate)->count();
          $previousBuyers=user::ByUserType(4)->whereBetween('created_at', [$previousdate,$lastdate])->count();
       
        if($lastBuyers!=0 && $previousBuyers!=0 )
          {
               $result=($lastBuyers/$previousBuyers)*100; 
          }
          else
          {

            $result=$previousBuyer==0?$lastBuyers*100:$previousBuyer*100;
          }
 

          $range=$result>100?'high':'low';
  
           return [
           		'buyers'=>$lastBuyers,
              'percentage'=>(float)number_format($result, 2, '.', ''),
              'range'=>$range,
           ];
   }
    public function getseller(Request $request)
   {
   	  // dd($request->duration);
        $duration =$request->duration==null ? '30' :$request->duration;
   		  $lastdate = Carbon::today()->subDays($duration)->toDateString();
        $previousdate = Carbon::today()->subDays($duration*2)->toDateString();
           
          $lastSeller = user::ByUserType(3)->where('created_at', '>=', $lastdate)->count();
          $previousSeller=user::ByUserType(3)->whereBetween('created_at', [$previousdate,$lastdate])->count();
       
         if($lastSeller!=0 && $previousSeller!=0)
          {
               $result=($lastSeller/$previousSeller)*100;  
          }
          else
          {
            $result=$previousSeller==0?$lastSeller*100:$previousOrders*100;
          }
 

          $range=$result>100?'high':'low';

           return [
           		'sellers'=>$lastSeller,
              'percentage'=>(float)number_format($result, 2, '.', ''),
              'range'=>$range,
           ];
   }
}
