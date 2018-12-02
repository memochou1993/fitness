<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class RecordControllerTest extends TestCase
{
    /**
     *
     *
     * @return void
     */
    public function testStore()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('POST', '/api/records', [
            'name' => 'new ' . config('seeds.items.name'),
            'unit' => config('seeds.items.unit'),
            'category_id' => config('seeds.categories.id'),
            'frequency' => config('seeds.records.frequency'),
        ]);

        $response->assertJson([
            'data' => [
                [
                    'name' => 'new ' . config('seeds.items.name'),
                    'unit' => config('seeds.items.unit'),
                    'category_id' => config('seeds.categories.id'),
                ],
            ],
        ])->assertStatus(201);
    }
}
