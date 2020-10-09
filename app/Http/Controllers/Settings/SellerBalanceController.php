<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\SellerBalance;
use App\Models\FeeSetting;
use App\Models\ShippingCharge;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Fee;
use App\Models\Address;

class SellerBalanceController extends Controller
{
	use SellerBalance;

     protected $sellingprice=2000;

     protected $percentage=10;

     // public function __construct()
     // {
     //     // $this->sellerprice=5000;
     //     // $this->percentage=5;
     // }
	
    public function displayFee()
    {
    	$res=[];

        $buyeraddress=Address::where('user_id',6)->where('default',1)->first();

        $selleraddress=Address::where('user_id',3)->where('default',1)->first();
        if($selleraddress->country==$buyeraddress->country)
        {
            if($selleraddress->state==$buyeraddress->state)
            {
                if($selleraddress->city==$buyeraddress->city)
                {
                    return 'local';
                }
                else
                {
                    return 'region';
                }
            }
            elseif($selleraddress->state!=$buyeraddress->state)
            {
                return 'national';
            }
       }
        dd($selleraddress);
        return $buyeraddress;

        $orderitem=OrderItem::where('id',3)->first();

        //dd($orderitem->productdetail['product']['name']);

       //for testing purpose
     
          // $attributesetcategory=AttributesetCategory::where('category_id','=',$request->category_id)->first();
          //  $attributesetid=$attributesetcategory->attributeset_id;

          //  $attribute=Attribute::where('attributeset_id','=',$attributesetid)->first();      
    	$res['feesetting']=$this->getFeeSettings();
    	$res['fee']=$this->getFeesValue();
    	$res['shippingcharge']=$this->getShippingCharge();

    	return $res;
    	
    }


    public function feedetails($grams,$itemsize,$scope)
    {
        $res=[];
        $array=array();

        //$arrayName = array('' => , );
       
        $orderitem=OrderItem::where('id',4)->first();
     
        $productid=$orderitem->productdetail;

        //return $productid;

        $categoryproduct=CategoryProduct::where('product_id',$productid)->first(); 
        $subcategory=Category::where('id',$categoryproduct->category_id)->first();
        $category=Category::where('id',$subcategory->parent_id)->first();

        // return $category;
        
        $referralfee=$this->sellingprice * $this->percentage/100;
        $res['referralfee']=$referralfee;
        $this->storefee($res['referralfee'],'referralfee');


        $feesetting=FeeSetting::where('min_amount','<=',$grams)->where('max_amount','>',$grams)->value('fee');

      
        
       if(count($feesetting)>0)
       {
         $res['closingfee']=$feesetting;
       }
       else{
        $res['closingfee']=FeeSetting::whereNull('max_amount')->value('fee');
       }
        $this->storefee($res['closingfee'],'closingfee');

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

        $this->storefee($res['shippingfee'],'shippingfee');

       $res['totalfee']=$res['referralfee'] + $res['closingfee'] + $res['shippingfee'];

       $this->storefee($res['totalfee'],'totalfee');


       $res['gst']=($res['totalfee'] * 18)/100;

       $this->storefee($res['gst'],'gst');

       $res['totalservicefee']=$res['totalfee']+$res['gst'];   

       $this->storefee($res['totalservicefee'],'totalservicefee'); 

       $res['sellercredit']=$this->sellingprice-$res['totalservicefee'];
 
       $this->storefee($res['sellercredit'],'sellercredit');

      return $res;


    }


    public function storefee($feevalue,$action)
    {
        
        $orderitem=OrderItem::where('id',3)->first();
         $fee=new Fee();
         $fee->user_id=3;
         $fee->fee=$feevalue;
         $fee->status='approve';
         $fee->action=$action;
         $fee->entity_id=3;
         $fee->entity_name=get_class($orderitem);
         $fee->save();
      

    }
}
