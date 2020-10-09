<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class EditPincodeRegionRequest extends FormRequest
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
         return [
            'city_id'=>'required',
            'state_id'=>'required',
            //'import_file'=>'required|max:10000|mimes:xls,xlsx',
        ];
    }

    public function messages()
    {      

        return [
            'city_id.required' =>trans('setting.city_id'), 
            'state_id.required' =>trans('setting.state_id'), 
            //'import_file'=>trans('setting.import_file')
        ];
    }
}
