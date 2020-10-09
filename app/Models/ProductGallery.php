<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class ProductGallery extends Model
{
      use SoftDeletes; 
     protected $table='product_galleries';
    // protected $with=['product'];
     protected $fillable=['product_id','attribute_id','position','imagepath','thumbnailimage'];


     public function product()
     {
     	//return $this->belongsTo('App\Models\stores','product_id');
     	return $this->belongsTo('App\Models\Product','product_id');
     }
    
     public function Attribute()
     {
     	return $this->belongsTo('App\Models\Attribute','attribute_id','id');
     }
}
