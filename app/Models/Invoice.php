<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Invoice extends Model
{
     use SoftDeletes; 
    protected $fillable=[
         'id','invoiceno','order_id','order_item_id','user_id','invoicedate','status'
         ,'total','filepath'
    ];

    protected $with=['user'];
    protected $casts=[
         'invoicedate' => 'date',
     ];

    public function order()
    {
    	return $this->belongsTo('App\Models\Order','order_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User','user_id');
    }

   

    
}
