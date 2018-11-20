<?php

use Faker\Generator as Faker;

$factory->define(App\UserItem::class, function (Faker $faker) {
    return [
        'frequency' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0.5, $max = 10.0),
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'item_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
