<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAnswer extends Model
{
     protected $table='productanswers';

   protected $fillable=['question_id','product_id','answer','visibility','status','likes','dislikes','approved_at','approved_by'];

    public function products(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function question(){
        return $this->belongsTo('App\Models\ProductQuestion','question_id');
    }
}
