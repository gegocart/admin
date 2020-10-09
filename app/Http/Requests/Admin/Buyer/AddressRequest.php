<?php

namespace App\Http\Requests\Admin\Buyer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Address;
use App\Models\City;
use App\Models\State;
class AddressRequest extends FormRequest
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
        
        Validator::extend('checkcity', function ($attribute, $value, $parameters, $validator)
        {  
           
            $city=City::where('id',$value)->first();

            if($city->state_id==request()->state_id)
            {
              return true;
            }
           return false;
        });


        Validator::extend('checkstate', function ($attribute, $value, $parameters, $validator)
        {  
            $state=State::where('id',$value)->first();

            if($state->country_id==request()->country_id)
            {
              return true;
            }
           return false;
        });

         Validator::extend('check', function ($attribute, $value, $parameters, $validator) 
         {


            $check =false;
            $address=Address::where('id',request()->address_id)->where('default',1)->first();  
           
           if(count($address)!=1)
            {


              $userid=request('userid');
              if($value!=0)
              {
                $check =Address::where('user_id',$userid)->where('default',1)->exists();  
              }
              
           
            if ($check)
            { 
                return false;
            }

          }
            
             return true;
        });
    $rules=[];

          if(request('mobileno')!='')
           {
             $rules['mobileno']='numeric';
           }
           if(request('lastname')!='')
           {
             $rules['lastname']='alpha';
           }

        $rules=[
           'firstname'=>'required|alpha',
           'address_1'=>'required',
           'address_2'=>'required',
           'pincode'=>'required|numeric',
           'default'=>'required|check',

           'city_id' => 'checkcity',
           'state_id' => 'checkstate',           
         
        ];
        return $rules;
    }
    public function messages()
    {
        return[

           'default.check'=>trans('edituser.defaultcheck'),
           'mobileno.numeric'=>trans('edituser.mobilenonumeric'),
           'lastname.alpha'=>trans('edituser.lastnamealpha'),
           'firstname.alpha'=>trans('edituser.firstnamealpha'),
           'firstname.required'=>trans('edituser.firstnamerequired'),
           'address_1.required'=>trans('edituser.address_1required'),
           'address_2.required'=>trans('edituser.address_2required'),
           'pincode.required'=>trans('edituser.pincoderequired'),
           'default.required'=>trans('edituser.defaultrequired'),
            'city_id.checkcity'=>trans('address.checkcity'),
            'state_id.checkstate'=>trans('address.checkstate'),
           
        ];
    }
}
