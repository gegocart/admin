<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class WishListItem extends Model
{
  use SoftDeletes;
    protected $table="wishlist_item";
    protected $fillable=[
       'wishlist_id',	'product_id',	'status','user_id', 
    ];
    public function wishlist()
    {
       return $this->belongsTo('App\Models\WishList','wishlist_id','id');
    }
    public function product()
    {
      return $this->belongsTo('App\Models\Product','product_id','id');
    }
    public function user()
    {
       return $this->belongsTo('App\Models\User','user_id','id');
    }
}
