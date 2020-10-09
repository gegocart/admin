<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasPrice;

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
}
