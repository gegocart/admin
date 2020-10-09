<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Auth;


class RatingReviewRequest extends FormRequest
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
        // Validator::extend('checkcity', function ($attribute, $value, $parameters, $validator)
        // {  
           
        //     $city=City::where('id',$value)->first();

        //     if($city->state_id==request()->state_id)
        //     {
        //       return true;
        //     }

        //    return false;
        // });

      return [
            'title' =>'required',
            'description'=>'required',
            'rating'=>'required',
            'entity_id'=>'required',
           ];
    }
}
