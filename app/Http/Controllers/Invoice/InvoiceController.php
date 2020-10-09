<?php

namespace App\Http\Controllers\Invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariationOrder;
use App\Models\ProductVariation;
use App\Models\OrderItem;
use App\Models\User;
use Exception;
use Auth;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\InvoiceResource;
use PDF;
use App\Traits\Common;
use App\Traits\LogActivity;
 use App\Models\Mailtemplate;
 

class InvoiceController extends Controller
{  use Common,LogActivity;
    
    public function store(Request $request)
    {

    	 $res=[];
    	 try
    	 {
    
         $invoice = Invoice::create($request->only('order_id',
          	'user_id','invoiceno','invoicedate','status', 'total','order_product_id'));

          
          $invoiceno=Invoice::find($invoice->id);
          $invoicenumber="INV00" . "_" . $invoiceno->id . "_" . $request->order_product_id;
          $invoiceno->invoiceno=$invoicenumber;
          $invoiceno->save();

          $order=Order::where('id',$request->order_id)->first();
          $buyerid=$order->user_id;
          $orderitemid=$request->order_product_id;



          $filename = "invoice".'_'.$invoicenumber;
          $label_path = '';
        

           $path;

          $path=$this->invoicepdf($order->id,$buyerid,$orderitemid,$invoicenumber);



          if($path==true)
          {
        
            $label_path = 'uploads/invoice/'.$filename.'.pdf';

            $invoiceno=Invoice::find($invoice->id);
            $invoice->filepath=$label_path;
            $invoice->save();
        
          }
          $mailinvoice=Invoice::where([['user_id',$invoice->user_id],['order_id',$invoice->order_id]])->first();
          $user = User::where('id',$invoice->user_id)->first();
         
          if($request->chkemail==true){
             

            $mailtemplate = Mailtemplate::where('name','invoice')->first();

            if($mailtemplate->status=='active')
            {
              Mail::to($user->email)->queue(new InvoiceMail($user,$mailinvoice));
            }
          }
        
           $res['message']="Saved Successfully";

           try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $invoiceno,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_INVOICE_STORED',
          'Invoice Stored'
        );

     }
    catch(Exception $e)
          {
             
            // dd($e->getMessage());
          }
            
           return $res;
         }
         catch(Exception $e)
         { 
         	//dd($e->getMessage());
          if(str_contains($e->getMessage(),'SQLSTATE[23000]: Integrity constraint violation: 1048 Column'))
          {
            $res['message']='Please Select Invoice Date';
          }
          else{
             $res['message']=$e->getMessage();
          }
         	 return $res;
          
         }
    }

    public function invoicepdf($orderid,$buyerid,$orderitemid,$invoicenumber)
    {
      try
      {
        
        $invoicedata=$this->getInvoicedetails($orderid,$buyerid,$orderitemid,Auth::id());
 
         // $invoicedata=$this->getInvoicedetails(2,6,2,Auth::id());
        
         $date=date('Y-m-d-HH_mm_ss', strtotime(now()));
              
         $filename = "invoice".'_'.$invoicenumber;
         $label_path = 'uploads/invoice/'.$filename.'.pdf';
        
         $pages = array();
    
          foreach ($invoicedata as $key => $value) {

            $data=[
            'sellername'=>$value->stores->sellername,
            'billfirstname'=>$value->address->firstname,
            'billlastname'=>$value->address->lastname,
            'billaddress'=>$value->address->address_1. ','.$value->address->address_2,
            'billcity'=>$value->address->city->name,
            'billstate'=>$value->address->state->name.'-'.$value->address->postalcode,
            'billcountry'=>$value->address->country->name,
            'shippingfirstname'=>$value->address->firstname,
            'shippinglastname'=>$value->address->lastname,
            'shippingaddress'=>$value->address->address_1. ','.$value->address->address_2,
            'shippingcity'=>$value->address->city->name,
            'shippingstate'=>$value->address->state->name.'-'.$value->address->postalcode,
            'shippingcountry'=>$value->address->country->name,
            'orderno'=>$value->orderno,
            'orderdate'=>date('Y-m-d', strtotime($value->created_at)),
            'paymentmethod'=>$value->paymentmethod->card_type,
            'transactions'=>$value->transactions,
            'transactionrequest'=>$value->transaction[0]->request,
            'invoiceno'=>$value->invoice[0]->invoiceno,
            'invoicedate'=>$value->invoice[0]->invoicedate,
            'currency'=>$value->orderitems[0]->currency->currency(),
            //'overalltotal'=>$value->invoice[0]->overalltotal,
            'orderitems'=>$value->orderitems,
             
         ];
        
          }

       
            $blade_file_path='invoice/downloadinvoice';
        // //dd($blade_file_path);
       $pages[] = \View::make($blade_file_path,$data);

      //dd($pages);
        //return  \View::make($blade_file_path,$data);
        $empty_blade_file_path='/invoice/empty';

        //$pdf = \PDF::loadView($blade_file_path,$data)->save(public_path().'/'.$label_path);
        
        $pdf = \PDF::loadView($empty_blade_file_path,[
            'pages' => $pages
        ])->save(public_path().'/'.$label_path);


        return true;
      }
      catch(Exception $e)
      {
        //dd($e->getMessage());
        return false;
      }
    }

    public function invoicepdf_test($orderid,$buyerid,$orderitemid,$invoicenumber)
    {
      try
      {

        $invoicedata=$this->getInvoicedetails($orderid,$buyerid,$orderitemid,3);
       // $invoicedata=$this->getInvoicedetails($orderid,$buyerid,$orderitemid,Auth::id());
              
         

         $date=date('Y-m-d-HH_mm_ss', strtotime(now()));
              
         $filename = "invoice".'_'.$invoicenumber;
         $label_path = 'uploads/invoice/'.$filename.'_'.$date.'.pdf';
 
         $pages = array();
    
          foreach ($invoicedata as $key => $value) {

            dump($value->orderitems);
           
            $data=[
            'sellername'=>$value->stores->sellername,
            'billfirstname'=>$value->address->firstname,
            'billlastname'=>$value->address->lastname,
            'billaddress'=>$value->address->address_1. ','.$value->address->address_2,
            'billcity'=>$value->address->city->name,
            'billstate'=>$value->address->state->name.'-'.$value->address->postalcode,
            'billcountry'=>$value->address->country->name,
            'shippingfirstname'=>$value->address->firstname,
            'shippinglastname'=>$value->address->lastname,
            'shippingaddress'=>$value->address->address_1. ','.$value->address->address_2,
            'shippingcity'=>$value->address->city->name,
            'shippingstate'=>$value->address->state->name.'-'.$value->address->postalcode,
            'shippingcountry'=>$value->address->country->name,
            'orderno'=>$value->orderno,
            'orderdate'=>date('Y-m-d', strtotime($value->created_at)),
            'paymentmethod'=>$value->paymentmethod->card_type,
            'transactions'=>$value->transactions,
            'transactionrequest'=>$value->transaction[0]->request,
            'invoiceno'=>$value->invoice[0]->invoiceno,
            'invoicedate'=>$value->invoice[0]->invoicedate,
            'currency'=>$value->orderitems[0]->currency->currency(),
            //'overalltotal'=>$value->invoice[0]->overalltotal,
            'orderitems'=>$value->orderitems,
             
         ];
        
          }

       
            $blade_file_path='invoice/downloadinvoice';
        // //dd($blade_file_path);
       $pages[] = \View::make($blade_file_path,$data);

      //dd($pages);
        //return  \View::make($blade_file_path,$data);
        $empty_blade_file_path='/invoice/empty';

        //$pdf = \PDF::loadView($blade_file_path,$data)->save(public_path().'/'.$label_path);
        
        $pdf = \PDF::loadView($empty_blade_file_path,[
            'pages' => $pages
        ])->save(public_path().'/'.$label_path);


        return  \View::make($blade_file_path,$data);
      }
      catch(Exception $e)
      {
        //dd($e->getMessage());
        //return false;
      }
    }
  

    protected function getInvoicenumber()
    {
        
        $invoicenonew;
        if(count(Invoice::get())<=0)
        {
           $invoicenonew="INV001";
        }
        else{
          $invoiceno=Invoice::orderBy("invoiceno","DESC")->take(1)->first()->invoiceno;
          $invoicenonew=++$invoiceno;
        } 
        return $invoicenonew;
    }

    protected function getInvoicedetails($orderid,$userid,$orderitemid,$sellerid)
    {
       $invoice=Order::with(['address','shippingMethod','paymentMethod',
        'transactions','orderitems'=>function($q)use($sellerid,$orderitemid){

    //       $q->where('seller_id',$sellerid)->orwhere('id',$orderitemid); 14/8

          $q->where('seller_id',Auth::id())->where('status','processing');
          
        },'invoice'=>function($q)use($orderitemid,$sellerid){
          $q->where('order_item_id',$orderitemid)->orwhere('user_id',$sellerid);
        },'stores'=>function($q)use($orderitemid){
           $q->where('orderitemid',$orderitemid);
        }])
       ->where('id',$orderid)->where('user_id',$userid)->get();
       
       // dump($invoice->orderitems);
      
        return InvoiceResource::collection(
            $invoice
        );
           
     // order,seller1,address
    }
    
    // protected function getInvoicedetails($orderid,$userid,$orderitemid,$sellerid)
    // {
       
    //    $invoice=Order::with(['address','shippingMethod','paymentMethod',
    //     'transactions','orderitems'=>function($q)use($sellerid,$orderitemid){
    //       $q->where('seller_id',$sellerid)->orwhere('id',$orderitemid);
    //     },'invoice'=>function($q)use($orderitemid,$sellerid){
    //       $q->where('order_item_id',$orderitemid)->orwhere('user_id',$sellerid);
    //     },'stores'=>function($q)use($orderitemid){
    //        $q->where('orderitemid',$orderitemid);
    //     }])
    //    ->where('id',$orderid)->where('user_id',$userid)->get();
       
      
    //     return InvoiceResource::collection(
    //         $invoice
    //     );
           
    //  // order,seller1,address
    // }
    

    protected function show_Invoicedetails($orderid,$userid,$orderitemid,$sellerid)
    {
      
       $invoice=Order::with(['address','shippingMethod','paymentMethod',
        'transactions','orderitems'=>function($q)use($sellerid,$orderitemid){
          
          // $q->where('seller_id',$sellerid)->where('id',$orderitemid); 14/8

          $q->where('seller_id',$sellerid)->where('status','completed');        

        },'invoice'=>function($q)use($orderitemid,$sellerid){
          $q->where('order_item_id',$orderitemid)->orwhere('user_id',$sellerid);
        },'stores'=>function($q)use($orderitemid){
           $q->where('orderitemid',$orderitemid);
        }])
       ->where('id',$orderid)->where('user_id',$userid)->where('status','completed')->get();
       
      
        return InvoiceResource::collection(
            $invoice
        );
           
     // order,seller1,address
    }

    
}
