<?php

use Faker\Generator as Faker;

$factory->define(App\Condition::class, function (Faker $faker) {
    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 40.0, $max = 100.0),
        'BMI' => $faker->randomFloat($nbMaxDecimals = 1, $min = 18.0, $max = 28.0),
        'BFP' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.1, $max = 0.3),
        'BMR' => $faker->randomFloat($nbMaxDecimals = 1, $min = 1000.0, $max = 1500.0),
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
