<?php

use App\Record;
use Illuminate\Database\Seeder;

class RecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Record::create([
            'frequency' => config('seeds.records.frequency'),
            'user_id' => config('seeds.users.id'),
            'item_id' => config('seeds.items.id'),
        ]);

        factory(Record::class, config('factories.record.number'))->create();
    }
}
