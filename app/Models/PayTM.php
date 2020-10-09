<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PayTM extends Model
{
	protected $table='paytm';
    protected $fillable=['mid','website','industrytype','channelid','orderid','custid'
    ,'mobileno','email','amt','callbackurl','url','checksum'];
}
