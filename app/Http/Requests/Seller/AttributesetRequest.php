<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class AttributesetRequest extends FormRequest
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
        
            'name' =>'required|unique:attributesets', //|alpha_dash
            'status'=>'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('adminvalidation.name'),
            'status.required' => trans('adminvalidation.status'),
           
                    ];
    }
}
