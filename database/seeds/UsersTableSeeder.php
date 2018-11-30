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
            'key' => config('seed.user.key'),
            'name' => config('seed.user.name'),
            'sex' => config('seed.user.sex'),
            'age' => config('seed.user.age'),
            'height' => config('seed.user.height'),
            'weight' => config('seed.user.weight'),
            'email' => config('seed.user.email'),
            'password' => config('seed.user.password'),
        ]);

        factory(User::class, config('factory.user.number'))->create();
    }
}
