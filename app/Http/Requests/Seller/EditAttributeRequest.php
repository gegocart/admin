<?php

namespace App\Http\Requests\seller;

use Illuminate\Foundation\Http\FormRequest;

class EditAttributeRequest extends FormRequest
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
         $rules = [];
        $input = $this->json()->all();

         // dd($input);

        $count=0;  

    // if($input['input_value']!='')
    // {
        $count=count($input['input_value']);

                for ($i=0; $i <$count; $i++)
               {  
                  if($input['input_value'][$i]=='')
                  {
                    $rules['input_value'.$i]='required';
                  }
               }
    // }

           $rules['attributeset_id'] ='required';
           $rules['attribute_code'] ='required';
           $rules['attribute_label'] ='required';//|alpha_dash',

            $rules['input_type'] ='required';
          if($input['attribute_code']!='no variation')
          { 
            
            // $rules['input_value'] ='required';
          }
       
        return $rules;
        // return [
        //    'attributeset_id' =>'required',
        //    'attribute_code' =>'required',
        //    'attribute_label' =>'required', //|alpha_dash
        //    'input_type' =>'required',
        // ];
    }
     public function messages()
      {
        $messages=[];
           
           $input = $this->json()->all();
        
           $count=0;  



    // if($input['input_value']!='')
    // {
       
        $count=count($input['input_value']);
       for ($i=0; $i <$count; $i++)
       { 
            $messages['input_value'.$i.'.required']='The input value is required';
       }
    // }
    // else
    // {
    //    $messages['input_value0'.'.required']='The input value is required';
    // }

            $messages['attributeset_id.required']=trans('category.attributeset_id');
            $messages['attribute_code.required']=trans('category.attribute_code');
            $messages['attribute_label.required']=trans('category.attribute_label');
            $messages['input_type.required']=trans('category.input_type');
            $messages['input_value.required']=trans('category.input_value');
                       
       return  $messages;
     }
}
