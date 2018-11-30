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
                    'key' => 'key',
                    'name' => 'Test Category',
                    'items' => [
                        [
                            'key' => 'key',
                            'name' => 'Test Item',
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
                    'key' => 'key',
                    'name' => 'Test Category',
                    'items' => [
                        [
                            'key' => 'key',
                            'name' => 'Test Item',
                        ],
                    ],
                ],
            ],
        ])->assertStatus(200);
    }
}
