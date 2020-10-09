<?php

namespace App\Models;

use App\Models\Traits\CanBeDefault;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 class Address extends Model
{
    use CanBeDefault,SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'country_id',
        'name',
        'firstname',
        'lastname',
        'address_1',
        'address_2',
        'city_id',
        'state_id',
        //'email',
       'mobileno',
        'postal_code',
        'default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
 
    public function state()
    {
        return $this->hasOne('App\Models\State','id','state_id');
    }
 
 public function city()
    {
        return $this->hasOne('App\Models\City','id','city_id');
    }

        public function scopeGetAddress($query,$user_id)
        {
           return  $query->where('user_id',$user_id)->where('default',1)->first();
        }
 
}
