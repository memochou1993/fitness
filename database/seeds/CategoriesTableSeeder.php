<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'key' => 'key',
            'name' => 'Test Category',
            'user_id' => 1,
        ]);

        factory(App\Category::class, 4)->create();
    }
}
