<?php

namespace App\Http\Requests\Giftcard;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\GiftcardOrder;
use App\Models\Order;

class GiftVoucherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
             Validator::extend('used', function ($attribute, $value, $parameters, $validator) 
       {
            // $order=Order::where([['giftorder_id','!=',null],['user_id',Auth::id()]])->first();
            $today=Carbon::now();
            $dateStr=$today->toDateString();

           $order=Order::where('user_id',Auth::id())->whereDate('created_at',$dateStr)->pluck('giftorder_id')->toArray();
           

                foreach ($order as $value)
                {
                  if($value!=null)
                  {
                    return false;
                  }
                }

           // if($order!=null)
           // {

           //  $orderstr=$order->created_at->toDateString();
            
           //  }
           /* if($orderstr==$dateStr){
                return false;

            }*/
            
               return true;
       });
         Validator::extend('expire', function ($attribute, $value, $parameters, $validator) 
       {
        // $check =GiftcardOrder::where([['code',$value],['is_used',0]])->whereHas('order',function($q) {
        //             $q->Where('status','completed');
        //           })->first();
         $today=Carbon::now();
         $dateStr=$today->toDateString();


         $check =GiftcardOrder::where('code',$value)->first();
        
        // if (!$check){ 
        //         return false;
        //     }
        // else{
            
             $expireDate=date("Y-m-d", strtotime($check->expire_on));
                  

          if($check->expire_on!=null)
          {
              if ($expireDate<$dateStr) {

                 return false;
                   
                }

            }
              return true;
                 
            
        });

       Validator::extend('invalid', function ($attribute, $value, $parameters, $validator) 
       {
        $giftcartorder=GiftcardOrder::where('code',$value)->first();
        
        
              if ($giftcartorder!=null && $giftcartorder->is_used==0) 
                {
                  // dd('yes');
                   return true;
                }
                return false;
            });


        
        return [
            'code'=>'required|expire|invalid|used',
            //
        ];
    }
     public function messages(){

        return[
            'code.expire'=>trans('giftcard.expire'),
            'code.required'=>trans('giftcard.require'),
            'code.used'=>trans('giftcard.used'),
             'code.invalid'=>trans('giftcard.invalid'),
        ];
    }
}
