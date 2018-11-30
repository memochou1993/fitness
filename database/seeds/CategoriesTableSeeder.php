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
            'key' => config('seed.category.key'),
            'name' => config('seed.category.name'),
            'user_id' => config('seed.user.id'),
        ]);

        factory(Category::class, config('factory.category.number'))->create();
    }
}
