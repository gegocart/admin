<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*use App\Models\User;*/
use Illuminate\Database\Eloquent\SoftDeletes;


class Store extends Model
{
    use SoftDeletes;

   // protected $with='products';
    
    protected $fillable=[
        'user_id','name','slug','status','description','keywords','storelogo',
        'storeimage','address'
    ];


    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product','store_id','id');
    }
    public function scopeActive($query){
        return $query->where('status',1);
    }
    public function scopeNextStore($query,$id){
        return $query->where('id','>',$id);
    }
    public function scopePreStore($query,$id){
        return $query->where('id','<',$id)->orderby('id','desc');
    }
    
}
