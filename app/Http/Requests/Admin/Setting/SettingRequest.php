<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class SettingRequest extends FormRequest
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
        // Validator::extend('checkname', function ($attribute, $value, $parameters, $validator)
        // {
        //    return preg_match('/^\p{L}[\p{L} A-Za-z0-9_~\-!,@#\$%\^&*.:(\)\s]+$/u',$value);
        // });
        // Validator::extend('checkdescription', function ($attribute, $value, $parameters, $validator)
        // {
        //    return preg_match('/^\p{L}[\p{L} A-Za-z0-9_~\-!,@#\$%\^&*.:(\)\s]+$/u',$value);
        // });
        // Validator::extend('checkvalue', function ($attribute, $value, $parameters, $validator)
        // {
        //    return preg_match('/^\p{L}[\p{L} A-Za-z0-9~\-!,@#\$%\^&*.:(\)\s]+$/u',$value);
        // });
        // Validator::extend('checkkey', function ($attribute, $value, $parameters, $validator)
        // {
        //    return preg_match('/^\p{L}[\p{L} A-Za-z0-9_~\-!,@#\$%\^&*.:(\)\s]+$/u',$value);
        // });

        return [
            'name'=>'required',
            'description'=>'required',
            'value'=>'required',
            'status'=>'required|numeric',
            'key'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>trans('setting.namerequired'),
            'description.required'=>trans('setting.descriptionrequired'),
            'value.required'=>trans('setting.valuerequired'),
            'status.required'=>trans('setting.statusrequired'),
            'key.required'=>trans('setting.keyrequired'),

            // 'name.checkname'=>trans('setting.checkspecial'),
            // 'description.checkdescription'=>trans('setting.checkspecial'),
            // 'value.checkvalue'=>trans('setting.checkspecial'),
            // 'value.checkkey'=>trans('setting.checkspecial'),
        ];
    }
}
