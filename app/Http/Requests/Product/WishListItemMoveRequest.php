<?php

namespace App\Http\Requests\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Models\WishListItem;
use Illuminate\Http\Request;
class WishListItemMoveRequest extends FormRequest
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
            // $wishlist_id=Input::get('wishlist_id');
          $wishlist_id=request('wishlist_id');
            $check =WishListItem::where('product_id',$value)->where('user_id',Auth::id())->where('wishlist_id',$wishlist_id)->exists();
        // dd($value);
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
        return [
            'product_id.check'=>trans('wishlist.product_id_check_detail'),
        ];
    }
}
