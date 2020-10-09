<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftcardImage extends Model
{
    //
    public function category()
    {
    	return $this->belongsTo('App\Models\Category','category_id');
    }
}
