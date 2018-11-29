<?php

use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Condition::create([
            'date' => '2018-11-20',
            'weight' => 70.0,
            'user_id' => 1,
        ]);

        factory(App\Condition::class, 4)->create();
    }
}
