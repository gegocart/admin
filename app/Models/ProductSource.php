<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSource extends Model
{
     protected $table='product_source';

   protected $fillable=['product_id','slug','source'];

    public function products(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
   
}
