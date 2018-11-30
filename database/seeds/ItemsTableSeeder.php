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
            'key' => config('seed.item.key'),
            'name' => config('seed.item.name'),
            'unit' => config('seed.item.unit'),
            'category_id' => config('seed.category.id'),
        ]);

        factory(Item::class, config('factory.item.number'))->create();
    }
}
