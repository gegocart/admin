<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftcardOrder extends Model
{
    //
    protected $with=['orderitem'];
    public function order()
    {
    	return $this->belongsTo('App\Models\Order','order_id');
    }
    public function orderitem()
    {
    	return $this->belongsTo('App\Models\OrderItem','item_id');
    }
    public function giftorder()
    {
        return $this->hasOne('App\Models\Order','giftorder_id','id');
    }
    
     public function scopeGetOrder($query,$id)
    {
       return $query->where([['id', $id]]);
    }
}
