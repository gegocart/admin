<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductFeatured extends Model
{ 
   use SoftDeletes;
    protected $table="product_featured";
    protected $fillable=[
       'product_id','featured_start_datetime','featured_end_datetime', 
    ];

    public function product()
    {
       return $this->belongsTo('App\Models\Product','product_id','id');
    }
   
}
