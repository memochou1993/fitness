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
            'key' => config('seeds.categories.key'),
            'name' => config('seeds.categories.name'),
            'user_id' => config('seeds.users.id'),
        ]);

        factory(Category::class, config('factories.category.number'))->create();
    }
}
