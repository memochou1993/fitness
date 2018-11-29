<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Item::create([
            'key' => 'key',
            'name' => 'Test Item',
            'unit' => 1,
            'category_id' => 1,
        ]);

        factory(App\Item::class, 4)->create();
    }
}
