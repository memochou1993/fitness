<?php

use Illuminate\Database\Seeder;
use App\UserItem;

class UserItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserItem::create([
            'frequency' => 1.5,
            'user_id' => 1,
            'item_id' => 1,
        ]);

        factory(UserItem::class, config('default.database.seeds.number', 24))->create();
    }
}
