<?php

use Illuminate\Database\Seeder;
use App\Condition;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condition::create([
            'key' => 'key',
            'date' => '2018-11-20',
            'weight' => 70.0,
            'user_id' => 1,
        ]);

        factory(Condition::class, config('default.database.seeds.number', 24))->create();
    }
}
