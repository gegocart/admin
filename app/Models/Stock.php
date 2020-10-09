<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Stock extends Model
{
	 use SoftDeletes; 
    protected $fillable=['id','quantity','product_variation_id'];

    public function productvariation()
    {
    	return $this->belongsTo('App\Models\ProductVariation','product_variation_id','id');
    }
}
