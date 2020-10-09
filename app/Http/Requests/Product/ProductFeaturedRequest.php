<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class ProductFeaturedRequest extends FormRequest
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

         $today=Carbon::now();
          $dateStr=$today->toDateString();
           $checkdate=date("Y-m-d", strtotime($value));

         if($checkdate<$dateStr)
         {
             return false;
         }
          return true;
       });
        return [
            'startdate' =>'required|date|before:enddate|check',
            'enddate' =>'required|date|after:startdate|check',
        ];
    }
     public function messages()
    {      

        return [
            'enddate.after' =>'End date must be greater than start date', 
            'startdate.before' =>'Start date must be less than end date', 
            'enddate.check' =>'Given date is expire', 
           'startdate.check' =>'Given date is expire', 
        ];
    }
}
