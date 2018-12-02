<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class RecordControllerTest extends TestCase
{
    /**
     *
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/users/me/records', [
            //
        ]);

        $response->assertJson([
            'data' => [
                [
                    'key' => config('seeds.items.key'),
                    'category' => config('seeds.categories.name'),
                    'name' => config('seeds.items.name'),
                    'frequency' => config('seeds.records.frequency'),
                    'unit' => config('seeds.items.unit'),
                    'completed' => config('seeds.records.completed'),
                ],
            ],
        ])->assertStatus(200);
    }

    /**
     *
     *
     * @return void
     */
    public function testIndexFail()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/users/me/records', [
            'per_page' => 'string',
        ]);

        $response->assertJson([
            'data' => [
                [
                    'per_page' => [
                        'The per page must be an integer.',
                    ],
                ],
            ],
        ])->assertStatus(400);
    }

    /**
     *
     *
     * @return void
     */
    public function testShow()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/users/me/records/' . config('seeds.items.key'), [
            //
        ]);

        $response->assertJson([
            'data' => [
                [
                    'key' => config('seeds.items.key'),
                    'category' => config('seeds.categories.name'),
                    'name' => config('seeds.items.name'),
                    'frequency' => config('seeds.records.frequency'),
                    'unit' => config('seeds.items.unit'),
                    'completed' => config('seeds.records.completed'),
                ],
            ],
        ])->assertStatus(200);
    }

    /**
     *
     *
     * @return void
     */
    public function testShowFail()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/users/me/records/' . config('seeds.items.key'), [
            'per_page' => 'string',
        ]);

        $response->assertJson([
            'data' => [
                [
                    'per_page' => [
                        'The per page must be an integer.',
                    ],
                ],
            ],
        ])->assertStatus(400);
    }
}
