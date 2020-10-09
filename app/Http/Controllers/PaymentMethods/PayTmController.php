<?php

namespace App\Http\Controllers\PaymentMethods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use PaytmWallet;
use App\Models\Transaction;
use Ixudra\Curl\Facades\Curl;
use App\Models\Traits\encdec_paytm;
use App\Models\Traits\PaytmChecksum;
use App\Models\PayTM;
use App\Models\OrderStatus;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartUser;
use App\Models\ProductVariationOrder;
use Exception;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\PayTmFailureMail;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Stock;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use App\Traits\TransactionProcess;
use App\Models\GiftcardOrder;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Mail\GiftcardOrderMail;
use App\Models\Mailtemplate;
use App\Traits\AddresscheckItemSizecheck;
use App\Traits\SellerBalance;

class PayTmController extends Controller
{  use Common,LogActivity,TransactionProcess,AddresscheckItemSizecheck,SellerBalance;

    use encdec_paytm;//,PaytmChecksum;

  
    public function paytmkey(Request $request) 
    {
      $res=[];
      try
      {

               
          $paytmParams = array(
            "MID" => $request->mid,
             "WEBSITE" => $request->website,
             "ORDER_ID" => $request->orderid,
             "CUST_ID" => $request->custid,
             "TXN_AMOUNT" => $request->txnamount,
            "CALLBACK_URL" => $request->callbackurl,
            "INDUSTRY_TYPE_ID" => $request->industrytype,
             "CHANNEL_ID" => $request->channelid,
             "MOBILE_NO" => $request->mobileno,
             "EMAIL" => $request->email,
          );
        
 

               $checksum = $this->getChecksumFromArray($paytmParams, $request->merchantkey);
                    //$checksum = PaytmChecksum::generateSignature($paytmParams, $request->merchantkey);
        
            //$this->validateCheckSum($request,$checksum,$request->merchantkey);
            

                /* for Staging */
                $url =$request->apiurl;

                 $paytm =new PayTM();
                 $paytm->mid=$paytmParams['MID'];
                 $paytm->website=$paytmParams['WEBSITE'];
                 $paytm->industrytype=$paytmParams['INDUSTRY_TYPE_ID'];
                 $paytm->channelid=$paytmParams['CHANNEL_ID'];
                 $paytm->orderid=$paytmParams['ORDER_ID'];
                 $paytm->custid=$paytmParams['CUST_ID'];
                 $paytm->mobileno=$paytmParams['MOBILE_NO'];
                 $paytm->email=$paytmParams['EMAIL'];
                 $paytm->amt=$paytmParams['TXN_AMOUNT'];
                 $paytm->callbackurl= $request->callbackurl;
                 $paytm->url=$url;
                 $paytm->checksum=$checksum;
                 
                 //$paytm->request=serialize($paytmParams);
                 //$paytm->response=$request->response;
                //$paytm->save();

                 $transactionset =Transaction::where('order_id',$paytmParams['ORDER_ID'])->first();
             
                 $transactionset->request=serialize($paytmParams);
                 $transactionset->save();

                 // dd($transactionset);
     try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $transactionset,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_PAYTM_PAYMENT_STORED',
          'Paytm Payment Stored'
        );

     }
    catch(Exception $e)
          {             
            //dd($e->getMessage());
          }

                 
                return $paytm;
             }
             catch(Exception $e)
             {
                  $res['message']=$e->getMessage();
                  
                  return $res;
             }

    }

    // public function paymentCallback($requestParamList)
     public function paymentCallback(Request $request)
     {

         $res=[];
         try
         {

          $input = $request->all();
     

            $mode=env('Mode');
            $apiURL='';
            if($mode=='development')
            {
               $apiURL = "https://securegw-stage.paytm.in/order/process";
            }
            else
            {
              $apiURL = "https://securegw.paytm.in/order/process";  
            }
           
            $jsonResponse = "";
            $responseParamList = array();
            $JsonData =json_encode($request);
            $postData = 'JsonData='.urlencode($JsonData);
            $ch = curl_init($apiURL);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
            'Content-Type: application/json', 
            'Content-Length: ' . strlen($postData))                                                                       
            );  
            $jsonResponse = curl_exec($ch);   
            $responseParamList = json_decode($jsonResponse,true);


    

          

            if($request->STATUS=="TXN_SUCCESS")
            {

              
              $res["TXNID"]=$request->TXNID;
              $res['redirect']="checkout";
              $res['message']="Transaction_Successfull";
              $this->transactionsuccesspaytm($request,$res);
               return redirect(env('Success_Url'));
            }
            else{
              $res['redirect']="checkout";
              $res['message']="Transaction Failure";

              //$res["response"]=$jsonResponse;


              $this->transactionfailurepaytm($request,$res); 
              return redirect(env('Failure_Url'));
            }

           
          }
          catch(Exception $e)
             {
 

                  $res['message']=$e->getMessage();
                
                 
                  return $res;
             }

     }
         
     public function transactionsuccesspaytm($parameters,$res)
     {
       try
        {
          \DB::beginTransaction();
             $grams;
             $scope;
             $itemsize;
             $orderitem=OrderItem::where('order_id',$parameters->ORDERID)->pluck('id')->toArray();
      
             foreach ($orderitem as $key => $value){
              
                $orderproduct=OrderItem::where('order_id',$parameters->ORDERID)
                                          ->where('id',$value)->first();
                if($orderproduct->status!='completed')
                {
                   if($orderproduct->productdetail['product']['type']=='giftcard')
                   {
                      $this->saveGiftcard($orderproduct,$value);
                    }
               }

                $orderproduct->status= 'completed'; //TXN_ACTION_COMPLETED;
                $orderproduct->save(); 

                $id=$parameters->ORDERID;
                 $sellerid=$orderproduct->seller_id;
                $order=Order::where('id',$parameters->ORDERID)->first();
                $user=User::where('id',$order->user_id)->first();

                
                $productid=$orderproduct->product_id;

                $categoryproduct=CategoryProduct::where('product_id',$productid)->first(); 
                $subcategory=Category::where('id',$categoryproduct->category_id)->first();
                $category=Category::where('id',$subcategory->parent_id)->first();

                $percentage=$category->commission_fee;
                $sellingprice=$orderproduct->price * $orderproduct->quantity;   
                $grams=$orderproduct->productdetail['product']['weight'];
                
                $array=array();
              
               $status='completed';//TXN_ACTION_COMPLETED;   
               $order=Order::find($id);

               $scope=$this->checkAddressStatus($orderproduct->seller_id,$orderproduct->buyer_id);
              
               $itemsize=$this->checkItemSize($grams);
             
               $feedetails=$this->feedetails($grams,$itemsize,$scope,$percentage,$sellingprice,
                $orderproduct->id,$sellerid);

               $adminamount=$feedetails['totalservicefee'];
               $selleramount=$feedetails['sellercredit'];
               $accounting_code=NULL;
               $action='paytm';
               $comments='';
               $response;
               $response=$parameters;
               // if($res['response']!=''){
               //  $response=$res["response"];
               // }
               if($res['message']!=''){
                  $comments= $res['message'];
               }

       
               //  $accounting_code,$comments,NULL,$response,
               //  $orderproduct->id,get_class($orderproduct),$array,$id);
               
               //seller -credit
                $this->createCreditTransaction($sellerid,$selleramount,$status,$action,
                $accounting_code,$comments,NULL,$response,
                $orderproduct->id,get_class($orderproduct),$array,$id);
                 
                //admin -debit
                $ADMIN_ID=1;
                $this->createDebitTransaction($ADMIN_ID,$adminamount,$status,$action,
                $accounting_code,$comments,NULL,$response,$orderproduct->id,
                get_class($orderproduct),$array,$id);
                
                          
              }
          
              $orderstatus=new OrderStatus();
              $orderstatus->order_id=$parameters->ORDERID;
              $orderstatus->from_status='pending';
              if($parameters->STATUS=="TXN_SUCCESS")
              {
                $orderstatus->to_status='completed';
              }
              else{
                $orderstatus->to_status='payment_failed';
              }
              
              $orderstatus->comments='Paytm Status';
              $orderstatus->save();

              $order=Order::where('id',$parameters->ORDERID)->first();
              $order->status='completed';
              $order->save();
              $user_id=$order->user_id;
              $status='approve';

              $invoicenonew;
              if(count(Invoice::get())<=0)
              {
                 $invoicenonew="INV001";
              }
              else{
                $invoiceno=Invoice::orderBy("invoiceno","DESC")->take(1)->first()->invoiceno;
                $invoicenonew=++$invoiceno;
              } 
              
               $invoice =new Invoice();
               $invoice->order_id=$parameters->ORDERID;
               $invoice->user_id=$user_id;
               $invoice->invoiceno=$invoicenonew;
               $invoice->invoicedate=now();
               $invoice->status='invoiced';
               $invoice->total=$parameters->TXNAMOUNT;
               $invo->created_at=now();
               $invo->updated_at=now();
               $invoice->save();

               
          $mailinvoice=Invoice::where([['user_id',$invoice->user_id],['order_id',$invoice->order_id]])->first();
          $user = User::where('id',$invoice->user_id)->first();
          Mail::to($user->email)->queue(new InvoiceMail($user,$mailinvoice));


              \DB::commit();


      try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $orderstatus,
         $user,
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_TARNSACTION_SUCCESS_PAYTM',
          'Transaction Success Paytm'
        );

     }
    catch(Exception $e)
          {
             
      
          }
        }
        catch(Exception $e)
         {
            \DB::rollBack();
    
             throw new Exception($e->getMessage());

         }
     }


  public function transactionfailurepaytm($parameters,$res)
     {

       \DB::beginTransaction();
      try
        {        
             $grams;
             $scope;
             $itemsize;
            
             $orderitem=OrderItem::where('order_id',$parameters->ORDERID)->pluck('id')->toArray();
          
             foreach ($orderitem as $value){
              
                $orderproduct=OrderItem::where('order_id',$parameters->ORDERID)
                                          ->where('id',$value)->first();
                   
                if($orderproduct->status!='completed')
                {
                   if($orderproduct->productdetail['product']['type']=='giftcard')
                   {
                      $this->saveGiftcard($orderproduct,$value);
                    }
               }
                $orderproduct->status='payment_failed'; //TXN_ACTION_COMPLETED;
                $orderproduct->save(); 

                                 
                $id=$parameters->ORDERID;
                
                $order=Order::where('id',$parameters->ORDERID)->first();
                $user=User::where('id',$order->user_id)->first();
                $productid=$orderproduct->product_id;

               $status='payment_failed';//TXN_ACTION_COMPLETED;   
               $order=Order::find($id);
               $sellerid=$orderproduct->seller_id;
               
               $action='paytm';
               $array['order_id']=$order->id;
               $amount=$parameters->TXNAMOUNT;
               $comments='Transaction_Failed';

                $this->createDebitTransaction($order->user_id,$amount,$status,$action,NULL,
                $comments,'',$parameters, $orderproduct->id,get_class($orderproduct),$array,$id);
           
               //  //admin -credit
               // $ADMIN_ID=1;
               //  $this->createCreditTransaction($ADMIN_ID,$adminamount,$status,$action,
               //  $accounting_code,$comments,NULL,$response,
               //  $orderproduct->id,get_class($orderproduct),$array,$id);
                 
               //  //seller -debit
               //  $this->createDebitTransaction($sellerid,$selleramount,$status,$action,
               //  '',$comments,NULL,$response,$orderproduct->id,get_class($orderproduct)
               //  ,$array,$id);
                
                          
              }
          
              $orderstatus=new OrderStatus();
              $orderstatus->order_id=$parameters->ORDERID;
              $orderstatus->from_status='pending';
              if($parameters->STATUS=="TXN_SUCCESS")
              {
                $orderstatus->to_status='completed';
              }
              else{
                $orderstatus->to_status='payment_failed';
              }
              
              $orderstatus->comments='Paytm_Status';
              $orderstatus->save();
              $order=Order::where('id',$parameters->ORDERID)->first();
              $order->status='payment_failed';
              $order->save();
              $user = User::where('id',$order->user_id)->first();
              
            // return true;
               \DB::commit();



    try{
        $ip = $this->getRequestIP();
         $this->doActivityLog(                                    
          $order,
          $user,
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_TARNSACTION_FAILURE_PAYTM',
          'Transaction Failure Paytm'
        );
     }
    catch(Exception $e)
    {
       
      //dump($e->getMessage());
    }
    Mail::to($user->email)->queue(new PayTmFailureMail($user->name)); 
        }
        catch(Exception $e)
         {
            \DB::rollBack();
            //dump($e->getMessage());
             //throw new Exception($e->getMessage());
         }
     }
     public function saveGiftcard($orderproduct,$value)
     {
        try
        {
          for($i=1;$i<=$orderproduct->quantity;$i++)
            {
              $date=date("Y-m-d H:i:s");
              $giftorder=new GiftcardOrder;
              $giftorder->order_id=$orderproduct->order_id;
              $giftorder->item_id=$value; //order_item_id
              $giftorder->amount=$orderproduct->price;
              $giftorder->code=$this->generateCoupons(1);
              $giftorder->expire_on= date('Y-m-d H:i:s', strtotime("+3 months", strtotime($date)));
              $giftorder->save();

            }
          
         
               $mailtemplate = Mailtemplate::where('name','gift_order')->first();

                if($mailtemplate->status=='active')
                {
                   $emailid=$orderproduct->to_email;
                   $toemail=explode(',', $emailid);
                   for ($i=0;$i<count($toemail); $i++) { 
                    Mail::to($toemail[$i])
                                    ->queue(new GiftcardOrderMail($orderproduct,$value));
                   }
                   
                }   
        }
        catch(Exception $e)
        {

        }
     }

  public function generateCoupons($count, $length = 16)
    {
        $coupons = [];
        while(count($coupons) < $count) {
            do {
                $coupon = strtoupper(str_random($length));
            } while (in_array($coupon, $coupons));
            $coupons[] = $coupon;
        }

        $existing = GiftcardOrder::whereIn('code', $coupons)->count();
        if ($existing > 0)
            $coupons += $this->generateCoupons($existing, $length);

        return (count($coupons) == 1) ? $coupons[0] : $coupons;
    }
}
