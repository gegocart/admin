<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PincodeRegion extends Model
{
	use SoftDeletes;
    protected $table='pincode_region';
    protected $fillable=['region_id','pincode','pincode_prefix'];

    public function region()
    {
    	return $this->belongsTo('App\Models\Region','region_id','id');
    }
}
