<?php

use Faker\Generator as Faker;

$factory->define(App\Condition::class, function (Faker $faker) {
    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 40.0, $max = 100.0),
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
