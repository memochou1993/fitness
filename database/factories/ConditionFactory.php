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

$factory->define(App\Condition::class, function (Faker $faker) {
    return [
        'key' => str_random(5),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 40.0, $max = 100.0),
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
