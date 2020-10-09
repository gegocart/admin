<?php
namespace App\Traits;
use Exception;
use App\Models\Fee;
use App\Models\FeeSetting;
use App\Models\ShippingCharge;
use App\Models\OrderItem;

trait SellerBalance
{

      //protected $sellingprice=5000;

     // public $percentage=5;

     public function feedetails($grams,$itemsize,$scope,$percentage,$sellingprice,$orderitemid,$userid)
    {
        $res=[];
        $array=array();

        //$arrayName = array('' => , );

        $referralfee=$sellingprice * ($percentage/100);
        $res['commissionfee']=$referralfee;
        $this->storefee($res['commissionfee'],'commissionfee',$orderitemid,$userid);


        $feesetting=FeeSetting::where('min_amount','<=',$grams)->where('max_amount','>',$grams)->value('fee');

      
        
       if(count($feesetting)>0)
       {
         $res['fixedfee']=$feesetting;
       }
       else{
        $res['fixedfee']=FeeSetting::whereNull('max_amount')->value('fee');
       }

        $this->storefee($res['fixedfee'],'fixedfee',$orderitemid,$userid);


        //collectionfee
        $collectionfee=($sellingprice*2)/100;
        $res['collectionfee']=$collectionfee;
        $this->storefee($res['collectionfee'],'collectionfee',$orderitemid,$userid);




        $standardbaselocalshippingcharge=ShippingCharge::where('min_weight','<',$grams)
         ->where('max_weight','<',$grams)->where('scope',$scope)->where('item_size',$itemsize)->pluck('charge');

         $standard_localshippingcharge=ShippingCharge::where('min_weight','<',$grams)
         ->where('max_weight','>=',$grams)->where('scope',$scope)->where('item_size',$itemsize)->value('charge');

          
         if(count($standard_localshippingcharge)>0)
         {
            $res['standardshippingcharge']=$standard_localshippingcharge;
         }
         else{
            $res['standardshippingcharge']=ShippingCharge::whereNull('max_weight')->where('scope',$scope)->where('item_size',$itemsize)->value('charge');
         }
      
        $res['baseshippingcharge']=$standardbaselocalshippingcharge;

        $shippingfee;
        for($i=0;$i<count($standardbaselocalshippingcharge);$i++) {
           $shippingfee += $standardbaselocalshippingcharge[$i];
        }

        $res['shippingfee']=$shippingfee + $res['standardshippingcharge'];

        $action='shippingfee'.'-'.$itemsize.'-'.$scope;

        $this->storefee($res['shippingfee'],$action,$orderitemid,$userid);



       $res['totalfee']=$res['commissionfee'] + $res['fixedfee'] + $res['shippingfee'] + $res['collectionfee'];

       $this->storefee($res['totalfee'],'totalfee',$orderitemid,$userid);


       $res['gst']=($res['totalfee'] * 18)/100;

       $this->storefee($res['gst'],'gst',$orderitemid,$userid);

       $res['totalservicefee']=$res['totalfee']+$res['gst'];   

       $this->storefee($res['totalservicefee'],'totalservicefee',$orderitemid,$userid); 

       $res['sellercredit']=$sellingprice-$res['totalservicefee'];
 
       $this->storefee($res['sellercredit'],'sellercredit',$orderitemid,$userid);

     
      return $res;


    }


    public function storefee($feevalue,$action,$orderitemid,$userid)
    {
        
        $orderitem=OrderItem::where('id',$orderitemid)->first();
         $fee=new Fee();
         $fee->user_id=$userid;
         $fee->fee=$feevalue;
         $fee->status='approve';
         $fee->action=$action;
         $fee->entity_id=$orderitemid;
         $fee->entity_name=get_class($orderitem);
         $fee->save();
      

    }


}