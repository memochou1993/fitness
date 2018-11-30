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
                    'key' => 'key',
                    'name' => 'Test Item',
                    'category' => [
                        'key' => 'key',
                        'name' => 'Test Category',
                    ],
                    'pivot' => [
                        'frequency' => 0.5,
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
            'name' => 'new Test Item',
            'unit' => 'new unit',
            'category_id' => 1,
            'frequency' => 1.0,
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'name' => 'new Test Item',
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
                    'key' => 'key',
                    'name' => 'Test Item',
                    'category' => [
                        'key' => 'key',
                        'name' => 'Test Category',
                    ],
                    'pivot' => [
                        'frequency' => 0.5,
                    ],
                ],
            ],
        ])->assertStatus(200);
    }
}
