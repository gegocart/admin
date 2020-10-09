<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

	 protected $table='attributes';

	 protected $fillable=['attributeset_id','attribute_code','attribute_label','input_type','input_value','required','visible','searchable','filterable','comparable'];

	  protected $casts = [
        'input_value' => 'array',
    ];


    public function attributesetrelation()
    {
    	return $this->belongsTo('App\Models\Attributeset','attributeset_id');
    }
}
