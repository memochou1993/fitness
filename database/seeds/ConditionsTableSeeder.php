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
            'key' => config('seed.condition.key'),
            'date' => config('seed.condition.date'),
            'weight' => config('seed.condition.weight'),
            'user_id' => config('seed.user.id'),
        ]);

        factory(Condition::class, config('factory.condition.number'))->create();
    }
}
