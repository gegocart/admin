<?php

namespace App\Models;

use App\Models\Traits\CanBeDefault;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class PaymentMethod extends Model
{    use SoftDeletes,CanBeDefault;
    //previous
    // protected $fillable = [
    //     'card_type',
    //     'last_four',
    //     'provider_id',
    //     'default',
    // ];
        protected $table="payment_methods";
        protected $fillable = [
        'user_id',
        'card_type',
        'last_four',
        'provider_id',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
