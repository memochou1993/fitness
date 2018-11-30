<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserItemControllerTest extends TestCase
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
        ])->json('GET', '/api/users/me/items', [
            'with' => 'category',
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seeds.items.key'),
                    'name' => config('seeds.items.name'),
                    'unit' => config('seeds.items.unit'),
                    'category' => [
                        'key' => config('seeds.categories.key'),
                        'name' => config('seeds.categories.name'),
                    ],
                    'pivot' => [
                        'frequency' => config('seeds.user_item.frequency'),
                        'completed' => config('seeds.user_item.completed'),
                    ],
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
        ])->json('GET', '/api/users/me/items', [
            'per_page' => 'string',
        ]);

        $response->assertJson([
            'status' => 'fail',
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
    public function testIndexError()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/users/me/items', [
            'with' => 'category,string',
        ]);

        $response->assertJson([
            'status' => 'error',
            'message' => [
                //
            ],
        ])->assertStatus(500);
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
        ])->json('POST', '/api/users/me/items', [
            'name' => 'new ' . config('seeds.items.name'),
            'unit' => config('seeds.items.unit'),
            'category_id' => config('seeds.categories.id'),
            'frequency' => config('seeds.user_item.frequency'),
        ]);

        $response->assertJson([
            'status' => 'success',
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
        ])->json('GET', '/api/users/me/items/' . config('seeds.items.key'), [
            'with' => 'category',
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seeds.items.key'),
                    'name' => config('seeds.items.name'),
                    'unit' => config('seeds.items.unit'),
                    'category' => [
                        'key' => config('seeds.categories.key'),
                        'name' => config('seeds.categories.name'),
                    ],
                    'pivot' => [
                        'frequency' => config('seeds.user_item.frequency'),
                        'completed' => config('seeds.user_item.completed'),
                    ],
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
        ])->json('GET', '/api/users/me/items/' . config('seeds.items.key'), [
            'per_page' => 'string',
        ]);

        $response->assertJson([
            'status' => 'fail',
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
    public function testShowError()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/users/me/items/' . config('seeds.items.key'), [
            'with' => 'items,string',
        ]);

        $response->assertJson([
            'status' => 'error',
            'message' => [
                //
            ],
        ])->assertStatus(500);
    }
}
