<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model
{
	protected $table = 'usersgroup';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
      public function users() 
    {
    	return $this->hasMany( 'App\Models\User','usergroup_id','id');
    }
}
