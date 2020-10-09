<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class TaxType extends Model
{
   use SoftDeletes;
   protected $table='tax_type';

   public function taxstatus()
   {
   	 return $this->where('status',true);
   }
  
}
