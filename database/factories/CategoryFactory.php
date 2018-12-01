<?php

use App\Category;
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

$factory->define(Category::class, function (Faker $faker) {
    return [
        'key' => str_random(5),
        'name' => $faker->bothify('Category ##??'),
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
