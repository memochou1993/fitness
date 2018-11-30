<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'key' => 'key',
            'name' => 'Test Category',
            'user_id' => 1,
        ]);

        factory(Category::class, config('default.database.seeds.number', 24))->create();
    }
}
