<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class WishList extends Model
{ 
   use SoftDeletes;
    protected $table="wishlists";
    protected $fillable=[
       'name','user_id','status','visibility', 
    ];

    public function user()
    {
       return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function wishlistitem()
    {
       return $this->hasMany('App\Models\WishListItem','wishlist_id','id');
    }
}
