<?php

use Illuminate\Database\Seeder;
use App\UserItem as Record;

class UserItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Record::create([
            'frequency' => config('seeds.user_item.frequency'),
            'user_id' => config('seeds.users.id'),
            'item_id' => config('seeds.items.id'),
        ]);

        factory(Record::class, config('factories.user_item.number'))->create();
    }
}
