<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariationOrder extends Model
{
    use SoftDeletes;
    
    protected $table = 'product_variation_order';
    protected $fillable = ['order_id','product_variation_id','quantity'];

     public function order()
     {
     	return $this->belongsTo('App\Models\Order','order_id','id');
     }

     public function productvariation()
     {
     	return $this->belongsTo('App\Models\ProductVariation','product_variation_id','id');
     }
}
