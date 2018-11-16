<?php

use Illuminate\Database\Seeder;

class UserItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserItem::class, 20)->create();
    }
}
