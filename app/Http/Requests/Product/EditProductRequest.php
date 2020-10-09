<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use Illuminate\Http\Request;

class EditProductRequest extends FormRequest
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


       $input = Request::input();
         if(($input['product_gallery']==0) && ($input['imagecount']==0)){
          $rules['product_image']='required|mimes:jpg,jpeg,png'; 
         }
 
         if($input['price']==0){
            $rules['price']='required';
         }
        
         if($input['weight']==0){
            $rules['weight']='required';
         }
     
        
         $rules['store_id']='required';
         $rules['name']='required';
         $rules['category_id']='required';
         $rules['sku']='required';
         $rules['description']='required';
         $rules['price']='required';
         $rules['weight']='required';

          return $rules;
    }

    public function messages()
    {     
        $messages = []; 
       $input = Request::input();
       $messages['category_id.required']=trans('product.categoryname');
       $messages['name.required']=trans('product.productname');
       $messages['store_id.required']=trans('product.storename');
       $messages['sku.required']=trans('product.sku');
       $messages['description.required']=trans('product.description');
       $messages['price.required']=trans('product.price');
       $messages['weight.required']=trans('product.weight');
       $messages['product_image.required']=trans('product.product_image');

       return $messages;
       
    }
}
