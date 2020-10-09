<?php

namespace App\Http\Controllers\Admin\GiftOrder;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Giftorder\GiftorderListResource;
use App\Http\Resources\Admin\Giftorder\GiftorderDetailResource;
use App\Models\OrderItem;
use App\Models\GiftcardOrder;


use Illuminate\Http\Request;
use Exception;

class GiftOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('admin.giftorder.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
         $paginate=$request->paginate == null ?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;
        $orderItem=OrderItem::with('order','giftcardorders')->where([['to_email','!=',null],['status','completed']]);
        $search=$request->search;
        if($search!="")
        {
              $orderItem=$orderItem->where(function($query) use($search){
                    $query->orwhere('to_email','LIKE',$search.'%')
                    ->orwhere('price','LIKE',$search.'.00')
                    ->orwhere('quantity','LIKE',$search)
                     ->orwhereHas('order',function($q) use($search){
                         $q->Where('orderno','LIKE',$search);
                 });
              });



           //  $orderItem=$orderItem->where(function($query) use ($search){
           //   $query->orWhere('id',$search)->orWhere('status',$search)
           //   ->orwhereHas('order',function($q) use($search){

           //           $q->Where(function($query1) use ($search){

           //              $query1->orwhereHas('paymentMethod',function($q1) use($search){
           //                   $q1->Where('gateway_name','LIKE',$search.'%');

           //              })->orwhereHas('shippingMethod',function($q3) use($search){
           //                   $q3->Where('name','LIKE',$search.'%');
                        
           //              })->orwhereHas('address',function($q2) use ($search){
           //                   $q2->Where('address_1','LIKE',$search.'%');

           //               });
           //          });
           //       });          
           // });
 
        }
            $orderItem=$orderItem->orderby('id',$orderby)->paginate($paginate);
         
        return GiftorderListResource::collection($orderItem);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getdetails(Request $request,$id)
    {
        //
        //dd($id);
         $paginate=$request->paginate == null ? '10' : $request->paginate;
            $orderby=$request->sort_by == null ? 'asc' : $request->sort_by;
   
           $orders=GiftcardOrder::with('giftorder','order')->where('order_id',$id); 
        $search=$request->search;
        if($search!="")
        {
            $orders=$orders->where(function($query) use ($search){
                $query->orWhere('id',$search)->orWhere('to_email',$search)->orWhere('quantity',$search)
                  ->orwhereHas('giftcardorders',function($q) use ($search){
                    $q->Where('amount','LIKE','%'.$search.'%');
                  });
            });
        }
            $orders=$orders->orderby('id',$orderby)->paginate($paginate);

      
      return GiftorderDetailResource::collection($orders);
      
    }


    public function show($id)
    {
        return view('admin.giftorder.details',['orderid'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try{

         $orderItem=OrderItem::where('order_id',$id)->update(['to_email' => $request->email]);
          $response['messages']="Status updated Successfully";
      }
      catch(Exception $e){
         dd($e->getMessage());
      }

          return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
