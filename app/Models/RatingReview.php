<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RatingReview extends Model
{
   use SoftDeletes;
	protected $table='rating_reviews';

	protected $fillable=['entity_id','entity_name','user_id','title','description','customer_name','rating','created_at'];

	public function product()
	{
		return $this->belongsTo('App\Models\Product','entity_id','id');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User','user_id','id');
	}

	public function productrate()
	{
		return $this->rating;
	}


	// public function ratetotal()
	// {
 //       return $this->productrate()->sum(function($rate){
 //            return $rate->productrate();
 //        });
	// }
}
