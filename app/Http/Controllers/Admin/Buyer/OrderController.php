<?php

namespace App\Http\Controllers\Admin\Buyer;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\GiftcardOrder;
class OrderController extends Controller
{
    public function orders(Request $request,$userid)
    {   
       $user=User::with('defaultAddress')->where('id',$userid)->first();
      $preuser=User::PreUser($userid,4)->first();
            $nextuser=User::NextUser($userid,4)->first();

        //check request
            $paginate=$request->paginate == null ? '10' : $request->paginate;
            $orderby=$request->sort_by == null ? 'asc' : $request->sort_by;
   
                    
        $orders=Order::with('address','shippingMethod','paymentMethod')->where('user_id',$userid);
        $search=$request->search;
        
        if($search!="")
        {
            $orders=$orders->where(function($query) use ($search){
                $query->orWhere('id',$search)->orWhere('status',$search)
                  ->orwhereHas('address',function($q) use ($search){
                    $q->Where('address_1','LIKE','%'.$search.'%');
                  })->orwhereHas('shippingMethod',function($q) use ($search){
                    $q->Where('name','LIKE',$search);
                  })->orwhereHas('paymentMethod',function($q) use ($search){
                    $q->Where('gateway_name','LIKE',$search);
                  });
            });
        }
            $orders=$orders->orderby('id',$orderby)->paginate($paginate);
    
            $orders=$orders->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
          
        return view('admin.buyer.order',[
             'orders'=>$orders,
             'user'=>$user,
           
             'preuser'=>$preuser,
             'nextuser'=>$nextuser,
        ]);        
    }

    public function giftorders(Request $request,$userid)
    {


       $user=User::with('defaultAddress')->where('id',$userid)->first();
      $preuser=User::PreUser($userid,4)->first();
            $nextuser=User::NextUser($userid,4)->first();

        //check request
            $paginate=$request->paginate == null ? '10' : $request->paginate;
            $orderby=$request->sort_by == null ? 'asc' : $request->sort_by;
   
                    
     //$orders=OrderItem::with('giftcardorders')->where([['buyer_id',$userid],['to_email','!=',null],['status','completed']]);
           $orders=GiftcardOrder::with('giftorder','order','orderitem')->whereHas('orderitem',function($q) use ($userid){
                    $q->Where('buyer_id',$userid);
                  }); 
        $search=$request->search;
       
        if($search!="")
        {    

           $orders=GiftcardOrder::with('giftorder','order','orderitem')->whereHas('orderitem',function($q) use ($userid){
                    $q->Where('buyer_id',$userid)->orWhere('to_email','LIKE','%'.$search.'%');
                  });


            // ->where(function($query) use($search){
            //           $query->orwhereHas('orderitem',function($q1) use ($search){
            //               $q1->Where('to_email','LIKE','%'.$search.'%');
            //          });
            //       });
            
            // $orders=$orders->where(function($query) use ($search){
            //     $query->orwhereHas('order',function($q2) use ($search){
            //         $q2->Where('id',$search);
            //       });
                // ->orwhereHas('giftorder',function($q) use ($search){
                //     $q->Where('amount','LIKE','%'.$search.'%');
                //   })->orwhereHas('orderitem',function($q1) use ($search){
                //     $q1->Where('to_email','LIKE','%'.$search.'%');
                //   });
            // });

            // dd($orders->get());
        }
            $orders=$orders->orderby('id',$orderby)->paginate($paginate);
    
     $orders=$orders->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
          
          
        return view('admin.buyer.giftorders',[
             'orders'=>$orders,
             'user'=>$user,
           
             'preuser'=>$preuser,
             'nextuser'=>$nextuser,
        ]);        
    }

}
