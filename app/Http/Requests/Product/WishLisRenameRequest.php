<?php

namespace App\Http\Requests\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\WishList;
use Auth;

class WishLisRenameRequest extends FormRequest
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
             
            $check =WishList::where('name',$value)->where('user_id',Auth::id())->exists();
              if ($check)
            { 
                return false;
            }
            
           return true;
        });
            
        return [
            'rename'=>'check|required',          
        ];
    }
    public function messages()
    {
        return[
          
            'rename.required'=>trans('wishlist.name_required_detail'),
            'rename.check'=>trans('wishlist.name_check_detail'),
        ];
    }

}
