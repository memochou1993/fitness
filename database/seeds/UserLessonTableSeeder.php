<?php

use Illuminate\Database\Seeder;

class UserLessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserLesson::class, 20)->create();
    }
}
