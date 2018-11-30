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
            'key' => config('seeds.users.key'),
            'name' => config('seeds.users.name'),
            'sex' => config('seeds.users.sex'),
            'age' => config('seeds.users.age'),
            'height' => config('seeds.users.height'),
            'weight' => config('seeds.users.weight'),
            'email' => config('seeds.users.email'),
            'password' => config('seeds.users.password'),
        ]);

        factory(User::class, config('factories.user.number'))->create();
    }
}
