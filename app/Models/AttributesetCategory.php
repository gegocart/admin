<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributesetCategory extends Model
{
	protected $table='attributeset_category';

   protected $fillable=['id','attributeset_id','category_id'];

    public function attributeset_category()
    {
       return $this->belongsTo('App\Models\Attributeset','attributeset_id','id');
    }

    public function category_attributeset()
    {
    	 return $this->belongsTo('App\Models\Category','category_id');
    }

    public function attributesets()
    {
    	
		  return $this->hasManyThrough('App\Models\Attribute','App\Models\Attributeset',
        'id','attributeset_id','attributeset_id','id');
 
          
    }


}
