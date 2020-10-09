<?php

namespace App\Models;

use App\Models\ShippingMethod;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'code',
        'name'
    ];

    public function shippingMethods()
    {
        return $this->belongsToMany(ShippingMethod::class);
    }
}
