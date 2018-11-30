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
            'key' => config('seeds.conditions.key'),
            'date' => config('seeds.conditions.date'),
            'weight' => config('seeds.conditions.weight'),
            'user_id' => config('seeds.users.id'),
        ]);

        factory(Condition::class, config('factories.condition.number'))->create();
    }
}
