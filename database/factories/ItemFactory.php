<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'key' => str_random(5),
        'name' => $faker->bothify('Item ##??'),
        'unit' => $faker->randomElement([
            '次', '趟', '場', '下',
        ]),
        'category_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
