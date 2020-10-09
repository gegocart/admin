<?php

namespace App\Http\Requests\Admin\Seller;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class EditRequest extends FormRequest
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
        
        $rules=[];
            
              $user=User::where('id',request()->userid)->first();


              $rules['email']=$user->email!=request()->email?'required|email:rfc,dns|unique:users,email':'required|email';

              // dd($rules['email']);
              $rules['name']=$user->name!=request()->name?'required|unique:users,name':'required';

              
              
             // $rules['usergroup_id']='required';  
       

        return $rules;
    }
    public function messages()
    {
        return[
           
           'name.required'=>trans('edituser.namerequired'),
           'email.required'=>trans('edituser.emailrequired'),
           'usergroup_id.required'=>trans('edituser.usergroup_idrequired'),
           
        ];
    }
}
