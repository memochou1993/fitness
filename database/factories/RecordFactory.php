<?php

use Faker\Generator as Faker;

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

$factory->define(App\Record::class, function (Faker $faker) {
    return [
        'frequency' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 10.0),
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'item_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
