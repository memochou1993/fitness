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
            'key' => 'key',
            'name' => 'Test User',
            'sex' => 1,
            'age' => 25,
            'height' => 180,
            'weight' => 65.0,
            'email' => 'homestead@test.com',
            'password' => bcrypt('secret'),
        ]);

        factory(User::class, config('default.database.seeds.number', 24))->create();
    }
}
