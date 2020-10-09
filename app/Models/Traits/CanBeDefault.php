<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait CanBeDefault
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($address) {
            if ($address->default) {
                $address->newQuery()->where('user_id', $address->user->id)->update([
                    'default' => false
                ]);
            }
        });
    }

    public function setDefaultAttribute($value)
    {
        $this->attributes['default'] = ($value === 'true' || $value ? true : false);
    }
}
