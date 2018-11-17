<?php

use Faker\Generator as Faker;

$factory->define(App\UserItem::class, function (Faker $faker) {
    return [
        'key' => str_random(5),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'frequency' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 10.0),
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'item_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
