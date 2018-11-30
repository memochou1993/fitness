<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'key' => 'key',
            'name' => 'Test Item',
            'unit' => 1,
            'category_id' => 1,
        ]);

        factory(Item::class, config('default.database.seeds.number', 24))->create();
    }
}
