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
                    'key' => config('seeds.categories.key'),
                    'name' => config('seeds.categories.name'),
                    'items' => [
                        [
                            'key' => config('seeds.items.key'),
                            'name' => config('seeds.items.name'),
                            'unit' => config('seeds.items.unit'),
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
        ])->json('GET', '/api/users/me/categories/' . config('seeds.categories.key'), [
            'with' => 'items',
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seeds.categories.key'),
                    'name' => config('seeds.categories.name'),
                    'items' => [
                        [
                            'key' => config('seeds.items.key'),
                            'name' => config('seeds.items.name'),
                            'unit' => config('seeds.items.unit'),
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
    public function testShowFail()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/users/me/categories/' . config('seeds.categories.key'), [
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
        ])->json('GET', '/api/users/me/categories/' . config('seeds.categories.key'), [
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
