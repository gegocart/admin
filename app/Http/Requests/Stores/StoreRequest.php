<?php

namespace App\Http\Requests\Stores;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

            'name' =>'required',//|alpha_dash',
            'slug'=>'required|unique:stores',
            'status'=>'required',
            'description'=>'required',
            'keywords'=>'required',
            'address'=>'required',
            'storelogo'=>'required|max:10000|mimes:jpg,jpeg,png',
            'storeimage'=>'required|max:10000|mimes:jpg,jpeg,png',
          ];
    }

      public function messages()
      {
        return [
           'name.required'=>trans('store.storename'),
            'slug.required'=>trans('store.slug'),
            'status.required'=>trans('store.storestatus'),
            'description.required'=>trans('store.storedescription'),
            'keywords.required'=>trans('store.keywords'),
            'address.required'=>trans('store.address'),
            'storelogo.required'=>trans('store.storelogo'),
            'storeimage.required'=>trans('store.storeimage'),
 
        ];
     }
}
