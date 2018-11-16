<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'key' => str_random(5),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
