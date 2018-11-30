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
            'key' => config('seeds.items.key'),
            'name' => config('seeds.items.name'),
            'unit' => config('seeds.items.unit'),
            'category_id' => config('seeds.categories.id'),
        ]);

        factory(Item::class, config('factories.item.number'))->create();
    }
}
