<?php

namespace App\Http\Requests\Orders;

use App\Models\Address;
use App\Rules\ValidShippingMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderStoreRequest extends FormRequest
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
     
          
      if(request('order_type')!='giftcard' && request('order_type')!='downloadable'){
        return [
            'address_id' => [
                'required',
                Rule::exists('addresses', 'id')->where(function ($builder) {
                    $builder->where('user_id', $this->user()->id);
                })
            ],
           
            // 'payment_method_id' => [
            //     'required',
            //     Rule::exists('payment_methods', 'id')->where(function ($builder) {
            //         $builder->where('user_id', $this->user()->id);
            //     })
            // ],
            'payment_method_id'=>'required',
            'shipping_method_id' => [
                'required',
                'exists:shipping_methods,id',
                new ValidShippingMethod($this->address_id)
            ]
                  ];
          }
          else
          {
           
            return [
                      'payment_method_id'=>'required',
                      
                  ]; 
          }

      }

      public function messages()
      {
        return [
            'address_id.required'=>trans('order.address_id'),
            'payment_method_id.required'=>trans('order.payment_method_id'),
            'shipping_method_id.required'=>trans('order.shipping_method_id')
 
        ];
     }
}
