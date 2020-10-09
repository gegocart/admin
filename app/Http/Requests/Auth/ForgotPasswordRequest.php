<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
 
        
class ForgotPasswordRequest extends FormRequest
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
        Validator::extend('checkspecialcharacter', function ($attribute, $value, $parameters, $validator)
        {  
            $check=true;            
            
            $sp='"%*;<>?^`{|}~\\\'#=&';
            if(preg_match("/[".$sp."]/",$value))
            {
                $check=false;
            }

            
           return $check;
        });
        return [
            'oldpassword' => 'required|checkspecialcharacter', 
            'newpassword' => 'required|min:6|checkspecialcharacter', 
            'confirmpassword' => 'required|min:6|same:newpassword|checkspecialcharacter'  
        ];


    }
    public function messages()
    {
        return[
            'oldpassword.checkspecialcharacter'=>trans('adduser.specialchar'),
            'newpassword.checkspecialcharacter'=>trans('adduser.specialchar'),
            'confirmpassword.checkspecialcharacter'=>trans('adduser.specialchar'),

        ];
    }

}
