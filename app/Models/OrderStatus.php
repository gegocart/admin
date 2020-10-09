<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class OrderStatus extends Model
{
	use SoftDeletes;
	protected $table='order_status';
	// 'created_by',
    protected $fillable=['order_id','order_item_id','from_status','to_status','comments','updated_by'];

    
}


