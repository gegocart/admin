<?php

use App\Models\ShippingMethod;
use Faker\Generator as Faker;

$factory->define(ShippingMethod::class, function (Faker $faker) {
    return [
        'name' => 'Royal Mail',
        'price' => 1000
    ];
});
