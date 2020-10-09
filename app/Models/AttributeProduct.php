<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AttributeProduct extends Model
{
    use SoftDeletes;
    
	protected $table='attribute_product';
    public $fillable=['product_id','attribute_id','attribute_value'];
    protected $with=['attribute'];

    public function product()
    {
    	 return $this->belongsTo('App\Models\Product','product_id','id');
    }
     public function attribute()
    {
    	 return $this->belongsTo('App\Models\Attribute','attribute_id','id');
    }

     public function productvariation()
    {
         return $this->belongsTo('App\Models\ProductVariation','attribute_product_id','id');
    }
}
