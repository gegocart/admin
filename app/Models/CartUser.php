<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartUser extends Model
{ use SoftDeletes;
    protected $table='cart_user';

    protected $fillable=['user_id','product_variation_id','quantity','to_email',
    'message','from_mail','card_image'];
    
    public function user()
    {
    	return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function ProductVariation()
    {
    	return $this->belongsTo('App\Models\ProductVariation','product_variation_id','id');
    }
    public function Product()
    {
        return $this->belongsTo('App\Models\Product','card_image','id');
    }
   
}
