<?php

namespace App\Http\Controllers\Admin\PaymentMethod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Auth;
use App\Http\Requests\Admin\PaymentMethod\PaymentMethodRequest;
use App\Http\Requests\Admin\PaymentMethod\EditPaymentMethodRequest;
class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
          $paginate=$request->paginate==null?'10':$request->paginate;
          $orderby=$request->sort_by==null?'asc':$request->sort_by;

       $search=$request->search;
       $paymentmethods=PaymentMethod::orderby('id',$orderby)->paginate($paginate);
 

     if($search!="")
     { 
        $paymentmethods=PaymentMethod::where(function($query) use ($search){
            $query->orWhere('gateway_name','LIKE',$search.'%')->orWhere('card_type','LIKE',$search.'%');
            })->orderby('id',$orderby)->paginate($paginate); 
                 
     }
            $paymentmethods=$paymentmethods->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
          
      
        return view('admin.paymentmethod.list',[
            'paymentmethods'=>$paymentmethods,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
       
        return view('admin.paymentmethod.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(PaymentMethodRequest $request)
    {
        $paymentmethod=new PaymentMethod;
        $paymentmethod->gateway_name=$request->gatewayname;
        $paymentmethod->card_type=$request->cardtype;
        $paymentmethod->is_active=$request->active;
        $paymentmethod->user_id=Auth::id();
        $paymentmethod->provider_id=$request->gatewayname;
        $paymentmethod->save(); 
        return redirect('/admin/paymentmethod')->with(['success'=>trans('success.paymentmethodadded')]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
      $paymentmethod=PaymentMethod::where('id',$id)->first();
       return view('admin.paymentmethod.edit',[
         'paymentmethod'=>$paymentmethod,
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPaymentMethodRequest $request, $id)
    {
         $paymentmethod=PaymentMethod::where('id',$id)->first();
        $paymentmethod->gateway_name=$request->gatewayname;
        $paymentmethod->card_type=$request->cardtype;
        $paymentmethod->is_active=$request->active;
        $paymentmethod->user_id=Auth::id();
        $paymentmethod->provider_id=$request->gatewayname;
        $paymentmethod->save(); 
  
        return redirect('/admin/paymentmethod')->with(['success'=>'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentMethod::where('id',$id)->delete();

         return redirect('/admin/paymentmethod')->with(['success'=>'PaymentMethod deleted successfully.']);
    }
}
