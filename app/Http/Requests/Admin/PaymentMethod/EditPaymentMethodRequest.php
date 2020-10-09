<?php

namespace App\Http\Requests\Admin\PaymentMethod;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\PaymentMethod;
  
class EditPaymentMethodRequest extends FormRequest
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
          
        return [
            'gatewayname'=>'required',
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
