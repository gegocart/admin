<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Transaction extends Model
{
    use SoftDeletes;
    /**
     * [$fillable description]
     * @var [type]
     */
    protected $fillable = [
        'order_id','user_id','type','status','action','amount','request','response',
        'transaction_date', 'transaction_id', 'comment','entity_id'
        ,'entity_name','balance_before','balance_after'
    ];

    public function order()
    {
    	 return $this->belongsTo('App\Models\Order','order_id','id');
    }

    public function orderitem()
    {
         return $this->belongsTo('App\Models\OrderItem','entity_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function productvariation()
    {
    	return $this->belongsTo('App\Models\ProductVariation','entity_id','id');
    }
     public function scopeBalanceBefore($query,$user_id)
    {
       return $query->where([['user_id', $user_id]]);
    }
}
