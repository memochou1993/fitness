<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class UserRecordControllerTest extends TestCase
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
            'with' => 'category',
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
    public function testStore()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('POST', '/api/users/me/records', [
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
            'with' => 'category',
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
