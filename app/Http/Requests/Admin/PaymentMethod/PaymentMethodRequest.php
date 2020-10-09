<?php

namespace App\Http\Requests\Admin\PaymentMethod;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\PaymentMethod;

class PaymentMethodRequest extends FormRequest
{
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
          Validator::extend('check', function ($attribute, $value, $parameters, $validator) 
         {
              
               $check =false;
              
              if($value!="")
              {

            $check =PaymentMethod::where('gateway_name',$value)->where('is_active',1)->exists();

              }
              
           
            if($check)
            { 
                return false;
            }
           
             return true;
        });
        return [
            'gatewayname'=>'required|check',
            'cardtype'=>'required',
            'active'=>'required|numeric'


        ];
    }
    public function messages()
    {
        return [
            'gatewayname.required'=>trans('paymentmethod.gatewaynamerequired'),
            'cardtype.required'=>trans('paymentmethod.carttyperequired'),
            'gatewayname.check'=>trans('paymentmethod.gatewaynamecheck'),            
        ];
    }

}
