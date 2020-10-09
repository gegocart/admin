<?php

namespace App\Http\Requests\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\WishListItem;
use Auth;
class AddWishItemRequest extends FormRequest
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
             
            $check =WishListItem::where('product_id',$value)->where('user_id',Auth::id())->exists();
        
            if ($check)
            { 
                return false;
            }
            
           return true;
        });
        return [
          
            'product_id'=>'check',
        ];
    }
    public function messages()
    {
        return[
            'product_id.check'=>trans('wishlist.product_id_check_detail'),
 
        ];
    }


}