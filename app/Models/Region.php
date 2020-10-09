<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use App\Cast\ArrayCast;
use App\Models\State;
use App\Models\City;

class Region extends Model
{
     //use SoftDeletes;
     protected $table='regions';
    protected $fillable=[
    	'id','country_id','regionname','state_id','city_id',
    	'seller_id','delivered','status'
    ];

     protected $appends=['state_name','city_name','state_count','city_count'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
     protected $casts = [
         'state_id' => 'array',
         'city_id'=>'array'
    ];

    public function getStateNameAttribute()
    {
         return State::whereIn('id',$this->state_id)->pluck('name');
    }

    public function getStateCountAttribute()
    {
         return State::whereIn('id',$this->state_id)->pluck('name')->count();
    }
    
    public function getCityCountAttribute()
    {
         return City::whereIn('id',$this->city_id)->pluck('name')->count();
    }

    public function getCityNameAttribute()
    {
      return City::whereIn('id',$this->city_id)->pluck('name');
    }
     
    public function pincoderegions()
    {
    	return $this->hasMany('App\Models\PincodeRegion','region_id','id');
    }

    public function countries()
     {
     	return $this->belongsTo('App\Models\Country','country_id','id');
     }

     // public function states()
     // {
     //    return $this->hasMany('App\Models\State','id','state_id');
     // }

     // public function cities()
     // {
     //    return $this->hasMany('App\Models\City','city_id','id');
     // }


    public function scopeState($query)
    {
       // return $query->whereIn()
    }  

    
}
