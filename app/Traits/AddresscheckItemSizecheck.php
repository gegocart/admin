<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Address;
use Exception;

trait AddresscheckItemSizecheck
{
	public function checkItemSize($weight)
    {
       if($weight<1000 && $weight<=5000) //kg
       {
         return 'standard';
       }
       elseif($weight>5000 && $weight<10000)
       {
         return 'oversize';
       }
       else{
        return 'heavy';
       }
    }

   public function checkAddressStatus($sellerid,$buyerid)
    {
      $buyeraddress=Address::where('user_id',$buyerid)->where('default',1)->first();

        $selleraddress=Address::where('user_id',$sellerid)->where('default',1)->first();
    
        if($selleraddress->country_id==$buyeraddress->country_id)
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

    }


}