<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\AttributesetCategory;
use App\Models\Attribute;
//use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
           

        Validator::extend('checkattribute', function ($attribute, $value, $parameters, $validator)
           {
           // dd($value);
        $attributeset = AttributesetCategory::where('category_id',$value)->first();
        // dd($attributeset);
              $attributesetid=$attributeset->attributeset_id;
           $attribute=Attribute::where('attributeset_id','=',$attributesetid)->first();


             if(count($attribute)==0)
             {
               return false;  
             }
             else
             {
               return TRUE;  
             }

           });
          
          $rules = [];

         $input = Request::input();
         

         if($input['imagecount']==0){
            $rules['product_image']='required|mimes:jpg,jpeg,png'; 
         }

        if($input['type']!='giftcard')
         {
  
             if($input['price']==0){
                $rules['price']='required|numeric';
             }

             if($input['type']=='physical'){
             $rules['weight']='required';
             }
          

         }
            if($input['type']=='downloadable'){
               // dd('alert');
             $rules['productsource']='required';
             }
         
         // for ($i=0; $i<$input['imagecount']; $i++) { 
         //      $rules['product_image'.$i] = 'required|mimes:jpg,jpeg,png'; 
         // }

           // for ($i=1; $i<=$input['imagecount']; $i++)
           //  { 
           //    dump('imagecount' .$i);
           //    $rules['product_image'.$i] = 'image|dimensions:max_width=250,max_height=250'; 
           //  }
        
         $rules['store_id']='required';
         $rules['name']='required';
         $rules['slug']='required|unique:products';
         $rules['category_id']='required|checkattribute';
         $rules['sku']='required';
         $rules['description']='required';
         $rules['tax_id']='required';
         $rules['type']='required';
         $rules['status']='required';
         
         if($input['type']!='giftcard')
         {
            $rules['price']='required|numeric|min:1';
            $rules['weight']='required|numeric'; 
         }

         
         

        //  $rules=[
    
      
        //     'store_id' =>'required',
        //     'name' => 'required',//|alpha_dash',
        //     'slug' => 'required|unique:products',
        //     'category_id'=>'required|checkattribute',
        //     'sku'=>'required',
        //     'description'=>'required',
        //     'price'=>'required|numeric|min:1',
        //     'weight'=>'required',
        //     //'product_image'=>'array',
        //    //'product_image.*' => 'required|mimes:jpg,jpeg,png',
        // ];
        return $rules;
    }
     public function messages()
    {     
      

        $messages = []; 
       $input = Request::input();


            // for ($i=1; $i<=$input['imagecount']; $i++)
            // { 

            //   dump('me');
            //   $messages['product_image'.$i.'.dimensions'] =trans('product.imageheight');
            // }
       $messages['category_id.checkattribute']=trans('product.attributemsg');
       $messages['category_id.required']=trans('product.categoryname');
       $messages['name.required']=trans('product.productname');
       $messages['store_id.required']=trans('product.storename');
       $messages['slug.required']=trans('product.slug');
       $messages['sku.required']=trans('product.sku');
       $messages['description.required']=trans('product.description');
       $messages['price.required']=trans('product.price');
       $messages['weight.required']=trans('product.weight');
       $messages['product_image.required']=trans('product.product_image');
       $messages['status.required']=trans('product.status');

       return $messages;
        // return [
        //     'category_id.checkattribute' =>'Attach Subcategory with attributeset and add Attributes for selected Category', 
          
          
        // ];
    }
}
