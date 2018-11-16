<?php

use Faker\Generator as Faker;

$factory->define(App\UserLesson::class, function (Faker $faker) {
    return [
        'key' => str_random(5),
        'length' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.3, $max = 3.0),
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'lesson_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
