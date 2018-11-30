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
            'frequency' => config('seed.user_item.frequency'),
            'user_id' => config('seed.user.id'),
            'item_id' => config('seed.item.id'),
        ]);

        factory(UserItem::class, config('factory.user_item.number'))->create();
    }
}
