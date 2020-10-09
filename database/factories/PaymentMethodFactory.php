<?php

use App\Models\PaymentMethod;
use Faker\Generator as Faker;

$factory->define(PaymentMethod::class, function (Faker $faker) {
    return [
        'card_type' => 'Visa',
        'last_four' => '4242',
        'provider_id' => str_random(10),
    ];
});
