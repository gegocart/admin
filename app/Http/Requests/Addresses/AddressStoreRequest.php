<?php

namespace App\Http\Requests\Addresses;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\City;
use App\Models\State;
class AddressStoreRequest extends FormRequest
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

        Validator::extend('checkcity', function ($attribute, $value, $parameters, $validator)
        {  
            $city=City::where('id',$value)->first();

            if($city->state_id==request()->state)
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


        return [
            // 'firstname' => 'required|unique:addresses|checkspecialcharacter',
            'firstname' => 'required|checkspecialcharacter',
            'lastname' => 'required',
            'address_1' => 'required',
            'address_2' => 'required',
            // 'mobileno'=>'required|unique:addresses,mobileno|numeric',
            'mobileno'=>'required|numeric',

            'city' => 'required|checkcity',
            'state' => 'required|checkstate',
            'postal_code' => 'required|numeric',
            'country_id' => 'required|exists:countries,id',
        ];
    }

    public function messages()
      {
        return [
            'firstname.required'=>trans('address.firstname'),
            'firstname.checkspecialcharacter'=>trans('address.specialcharacter'),
            'lastname.required'=>trans('address.lastname'),
            'mobileno.required'=>trans('address.mobileno'),
            'mobileno.numeric'=>trans('address.numeric'),
            'address_1.required'=>trans('address.address_1'),
            'address_2.required'=>trans('address.address_2'),
            'city.required'=>trans('address.city'),
            'state.required'=>trans('address.state'),
            'country_id.required'=>trans('address.country_id'),
            'postal_code'=>trans('address.postal_code'),
            'city.checkcity'=>trans('address.checkcity'),
            'state.checkstate'=>trans('address.checkstate'),
        ];
     }
}
