<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Store::class, function (Faker $faker) {
    $name = $faker->company;
    return [
    	'user_id' => 3,
        'name' => $name,
        'slug' => Str::slug($name),
        'description' => $faker->paragraph,
        'keywords' => $faker->word,
        'address' => $faker->address
    ];
});
