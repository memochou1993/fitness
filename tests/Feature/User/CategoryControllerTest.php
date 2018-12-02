<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CategoryControllerTest extends TestCase
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
            //
        ]);

        $response->assertJson([
            'data' => [
                [
                    'key' => config('seeds.categories.key'),
                    'name' => config('seeds.categories.name'),
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
        ])->json('GET', '/api/users/me/categories/' . config('seeds.categories.key'), [
            //
        ]);

        $response->assertJson([
            'data' => [
                [
                    'key' => config('seeds.categories.key'),
                    'name' => config('seeds.categories.name'),
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
