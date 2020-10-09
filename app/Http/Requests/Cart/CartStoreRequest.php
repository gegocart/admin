<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ProductVariation;



class CartStoreRequest extends FormRequest
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
          $product=ProductVariation::where('id',request('products.0.id'))->first();
    // dd('t');
        $rules=[
            'products' => 'required|array',
            'products.*.id' => 'required|exists:product_variations,id',
            'products.*.quantity' => 'numeric|min:1',

        ];

        if($product->product->type=='giftcard')
        {
            $rules['email']='required|email';
        }
        
      
        return $rules;
    }

    public function messages()
    {
     return[
        'email.required'=>trans('giftcard.email'),
        'email.email'=>trans('giftcard.email_invalid'),
         ];
    }
}
