<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Test User',
            'sex' => 'male',
            'age' => 25,
            'height' => 180,
            'weight' => 65.0,
            'email' => 'homestead@test.com',
            'password' => bcrypt('secret'),
        ]);

        factory(App\User::class, 4)->create();
    }
}
