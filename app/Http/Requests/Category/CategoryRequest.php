<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' =>'required|unique:categories',
            'commissionfee'=>'numeric|min:0.0|max:99',
            'slug'=>'required|unique:categories',
           
        ];
    }
     public function messages()
      {
        return [
            'name.required'=>trans('category.name'),
            'commissionfee.required'=>trans('category.commissionfee'),
            'slug.required'=>trans('category.slug')
            //'name.regex'=>'',
            
         ];
     }
}
