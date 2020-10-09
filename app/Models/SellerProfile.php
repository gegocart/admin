<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerProfile extends Model
{
    protected $table='sellerprofiles';

    protected $fillable=['seller_name','email','mobileno','company_name','company_url',
     'aboutbusiness'];

     
}
