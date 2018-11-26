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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'key' => str_random(5),
        'name' => $faker->name,
        'sex' => $faker->numberBetween($min = 1, $max = 3),
        'age' => $faker->numberBetween($min = 18, $max = 60),
        'height' => $faker->numberBetween($min = 150, $max = 200),
        'weight' => $faker->randomFloat($nbMaxDecimals = 1, $min = 40.0, $max = 100.0),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
