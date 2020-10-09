<?php

namespace App\Http\Requests\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\WishList;
use App\Models\WishListItem;
use Auth;
 


class AddWishListRequest extends FormRequest
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
      //dd($value);
            if ($check)
            { 
                return false;
            }
            
           return true;
        });

        Validator::extend('checkproduct', function ($attribute, $value, $parameters, $validator) 
       {
             
            $check =WishListItem::where('product_id',$value)->where('user_id',Auth::id())->exists();
        // dd($value);
            if ($check)
            { 
                return false;
            }
            
           return true;
        });
        return [
            'name'=>'required|check',
            'product_id'=>'checkproduct',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>trans('wishlist.name_required_detail'),
            'name.check'=>trans('wishlist.name_check_detail'),
            'product_id.checkproduct'=>trans('wishlist.product_id_check_detail'),
        ];
    }
}
