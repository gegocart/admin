<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryShippingMethod extends Model
{
    Protected $table = 'country_shipping_method';
    Protected $fillable = ['country_id','shipping_method_id'];
    
	public function country()
	{
		return $this->belongsTo('App\Models\Country','country_id','id');
	}
	
	public function shippingmethod()
	{
		return $this->belongsTo('App\Models\ShippingMethod','shipping_method_id','id');
	}
}
