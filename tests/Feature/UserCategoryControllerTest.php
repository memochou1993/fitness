<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCategoryControllerTest extends TestCase
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
        ])->json('GET', '/api/users/me/categories', [
            'with' => 'items',
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seed.category.key'),
                    'name' => config('seed.category.name'),
                    'items' => [
                        [
                            'key' => config('seed.item.key'),
                            'name' => config('seed.item.name'),
                            'unit' => config('seed.item.unit'),
                        ],
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
        ])->json('GET', '/api/users/me/categories', [
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
        ])->json('GET', '/api/users/me/categories', [
            'with' => 'items,string',
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
    public function testShow()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/users/me/categories/key', [
            'with' => 'items',
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seed.category.key'),
                    'name' => config('seed.category.name'),
                    'items' => [
                        [
                            'key' => config('seed.item.key'),
                            'name' => config('seed.item.name'),
                            'unit' => config('seed.item.unit'),
                        ],
                    ],
                ],
            ],
        ])->assertStatus(200);
    }
}
