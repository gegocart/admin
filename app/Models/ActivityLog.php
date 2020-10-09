<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityLog extends Model
{
   protected $table = 'activity_log';

   protected $fillable=['causer_id','properties','log_name','description','subject_id','subject_type','causer_type'];

   protected $casts=[
    	'properties'=>'array'	

    ];

   protected $with = array('user');
   
   public function user()
   {
       return $this->belongsTo('App\Models\User', 'causer_id','id');
   }
}