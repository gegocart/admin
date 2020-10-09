<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributesetCategory;

class Attributeset extends Model
{
   

   public function category()
   {
   	 return $this->belongsToMany(Category::class);
   }

   // public function attribute()
   // {
   // 	 return $this->belongsTo(Attribute::class);
   // }


   public function attribute()
   {
   	 return $this->hasOne('App\Models\AttributesetCategory','attributeset_id','id');
   }

  public function attributesrelation()
  {
    return $this->hasMany('App\Models\Attributeset','attributeset_id','id');
  }


}
