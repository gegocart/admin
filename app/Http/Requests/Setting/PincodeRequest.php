<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Region;

class PincodeRequest extends FormRequest
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
            if(request()->import_file!='undefined')
            {
               $filename=request()->file('import_file')->getClientOriginalName();

        
               if (Region::where('import_file_name', $filename)->exists()) {
                  return false;
                 } 

             return true;
            }
       });
         return [
            //'pincode' =>'required|numeric',
            'city_id'=>'required',
            'state_id'=>'required',
            'country_id'=>'required',
            'regionname'=>'required',
            'delivered'=>'required',
            'import_file'=>'required|max:10000|mimes:xls,xlsx|check',
        ];
    }

    public function messages()
    {      

        return [
            'city_id.required' =>trans('setting.city_id'), 
            'state_id.required' =>trans('setting.state_id'), 
            'country_id.required'=>trans('setting.country_id'),
            'regionname.required'=>trans('setting.regionname'),
            'delivered.required'=>trans('setting.delivered'),
            'import_file.required'=>trans('setting.import_file'),
            'import_file.check'=>trans('setting.exists'),
          
          
        ];
    }
}
