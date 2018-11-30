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
            'frequency' => config('seeds.user_item.frequency'),
            'user_id' => config('seeds.users.id'),
            'item_id' => config('seeds.items.id'),
        ]);

        factory(UserItem::class, config('factories.user_item.number'))->create();
    }
}
