<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;


class AdminChangePasswordRequest extends FormRequest
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




         Validator::extend('checkpass', function ($attribute, $value, $parameters, $validator) 
         {


             $user=User::where('id',1)->first();
             // $user=User::where('id',Auth::user()->id)->first();
             // dd($user);
             if(Hash::check($value,$user->password))
             {
                // dd($value);
                return true;
             }
             return false;
        });
        return [
             'oldpassword'=>'required|checkpass',
             'password' => 'required|string|min:6|confirmed|checkspecialcharacter',
            
        ];
    }
    public function messages()
    {
       return[
        'oldpassword.required'=>trans('changepassword.oldpassrequired'),
        'password.required'=>trans('changepassword.newpassrequired'),
        'oldpassword.checkpass'=>trans('changepassword.oldpasswrong'),
        'password.checkspecialcharacter'=>trans('auth.specialchar'),
       ];

    }
}
