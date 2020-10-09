<?php

namespace App\Http\Controllers\GiftOrders;
use App\Http\Controllers\Controller;
use App\Models\GiftcardOrder;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use App\Http\Requests\Giftcard\GiftVoucherRequest;
use Auth;

class GiftOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      
        $show=(int)$request->show;
        $search=$request->search;
         $orderdetail=GiftcardOrder::with('giftorder','order')->whereHas('orderitem',function($q) use ($search){
                    $q->Where('seller_id',Auth::id());
                  });
        // dd($search);

                  if($search!="")
            {

                 $orderdetail=$orderdetail->where(function($query) use ($search){
                $query->orWhere('amount',$search)->orWhere('code',$search)
                  ->orwhereHas('orderitem',function($q) use ($search){
                    $q->Where('to_email','LIKE','%'.$search.'%');
                  })->orwhereHas('order',function($q) use ($search){
                    $q->Where('orderno','LIKE',$search);
                  });
            });
            }  
            $orderdetail=$orderdetail->latest()->paginate($show);

      return $orderdetail;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
        $orderdetail=GiftcardOrder::with('giftorder','order')->where('id',$id)->whereHas('orderitem',function($q) use ($search){
                    $q->Where('seller_id',Auth::id());
                  })->first();

       // dd($id);
         $orderdetail['category']=CategoryProduct::with('category','product')->where('product_id',$orderdetail->orderitem->product_id)->first();
    
        return $orderdetail;
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

     public function giftcode(GiftVoucherRequest $request)
    {
       
        $giftvoucer =GiftcardOrder::where('code',$request->code)->first();
        $data['message']="Gift voucher applied successfully";
        $data['giftvoucer']=$giftvoucer;

        return $data;
    }
}
