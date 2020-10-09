<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\Models\User;

class UserRequest extends FormRequest
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
           'name' =>'required|unique:users,name',
           'email'=>'required|email|unique:users,email', 
            //'image'=>'required|max:10000|mimes:jpg,jpeg,png',
           
        ];
    }

    public function messages()
      {
        return [
           'name.required'=>trans('user.name'),
           'email.required'=>trans('user.email'), 
        ];
     }
}
