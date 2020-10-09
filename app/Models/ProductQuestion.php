<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductQuestion extends Model
{
	 protected $table='productquestions';
    protected $fillable=['buyer_id','seller_id','product_id','question'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function products(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function answer(){
        return $this->hasOne('App\Models\ProductAnswer','question_id','id');
    }
}
