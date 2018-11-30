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
                    'key' => config('seed.item.key'),
                    'name' => config('seed.item.name'),
                    'unit' => config('seed.item.unit'),
                    'category' => [
                        'key' => config('seed.category.key'),
                        'name' => config('seed.category.name'),
                    ],
                    'pivot' => [
                        'frequency' => config('seed.user_item.frequency'),
                        'completed' => config('seed.user_item.completed'),
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
            'name' => 'new ' . config('seed.item.name'),
            'unit' => config('seed.item.unit'),
            'category_id' => config('seed.category.id'),
            'frequency' => config('seed.user_item.frequency'),
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'name' => 'new ' . config('seed.item.name'),
                    'unit' => config('seed.item.unit'),
                    'category_id' => config('seed.category.id'),
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
        ])->json('GET', '/api/users/me/items/key', [
            'with' => 'category',
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seed.item.key'),
                    'name' => config('seed.item.name'),
                    'unit' => config('seed.item.unit'),
                    'category' => [
                        'key' => config('seed.category.key'),
                        'name' => config('seed.category.name'),
                    ],
                    'pivot' => [
                        'frequency' => config('seed.user_item.frequency'),
                        'completed' => config('seed.user_item.completed'),
                    ],
                ],
            ],
        ])->assertStatus(200);
    }
}
