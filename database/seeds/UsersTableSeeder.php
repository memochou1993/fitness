<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'key' => config('seeds.user.key', 'key'),
            'name' => config('seeds.user.name', 'Test User'),
            'sex' => config('seeds.user.sex', 1),
            'age' => config('seeds.user.age', 25),
            'height' => config('seeds.user.height', 180),
            'weight' => config('seeds.user.weight', 65.0),
            'email' => config('seeds.user.email', 'homestead@test.com'),
            'password' => config('seeds.user.password', bcrypt('secret')),
        ]);

        factory(User::class, config('seeds.number.user', 24))->create();
    }
}
