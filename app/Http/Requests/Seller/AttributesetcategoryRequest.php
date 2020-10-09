<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class AttributesetcategoryRequest extends FormRequest
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
            'attributeset_id'=>'required'
        ];
    }

    public function messages()
      {
        return [
            'attributeset_id.required'=>trans('category.attributeset_id'),
                       
         ];
     }
}
