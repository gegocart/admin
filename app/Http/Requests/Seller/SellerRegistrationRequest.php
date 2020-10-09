<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Validator;


class SellerRegistrationRequest extends FormRequest
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
             'name' =>'required|unique:users|checkspecialcharacter',//|alpha_dash
             'mobileno'=>'required|unique:sellerprofiles,mobileno|checkspecialcharacter',
             'email' => 'required|email:rfc,dns|unique:users,email',
             'password' => 'required|min:6|checkspecialcharacter',
             'company_name'=>'required|checkspecialcharacter',
             'company_url'=>'required|url',
             'aboutbusiness'=>'required',
        ];
    }

    public function messages()
      {
        return [
            'name.required'=>trans('adduser.name'),
            'mobileno.required'=>trans('adduser.mobileno'),
            'email.required'=>trans('adduser.email'),
            'password.required'=>trans('adduser.password'),
            'company_name.required'=>trans('adduser.company_name'),
            'company_url.required'=>trans('adduser.company_url'),
            'aboutbusiness'=>trans('adduser.aboutbusiness'),
            'password.checkspecialcharacter'=>trans('adduser.specialchar'),
            'name.checkspecialcharacter'=>trans('adduser.specialchar'),
            'mobileno.checkspecialcharacter'=>trans('adduser.specialchar'),
            'company_name.checkspecialcharacter'=>trans('adduser.specialchar'),
             
        ];
     }
}
