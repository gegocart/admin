<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Attributeset;
use Illuminate\Support\Facades\Validator;

class EditAttributesetRequest extends FormRequest
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
        

         Validator::extend('check', function ($attribute, $value, $parameters, $validator) 
         {

         $check=Attributeset::where('name',$value)->exists();

         // 
        
           if($check)
           {  
              $attributeset=Attributeset::where('id',request()->id)->first();  
               if($attributeset->name==request()->name)
               {
                  return true;
               }
               else
               {
                 return false;
               }
           }
           else
           {
               return true;
           }
           
        });

         

        return [
            'name'=>'required|check',
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
             'name.check'=>trans('editattributeset.name_check_detail'),
             'name.required'=>trans('editattributeset.name_required_detail'),
        ];
    }
}
