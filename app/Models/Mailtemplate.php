<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
 
class Mailtemplate extends Model
{
	use SoftDeletes; 
    protected $table = 'mail_templates';
    protected $fillable = [
        'name',
        'subject',
        'mail_content',
        'status',
    ];

 	
}
