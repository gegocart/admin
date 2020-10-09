<?php

use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'code' => 'GB',
        'name' => 'United Kingdom'
    ];
});
