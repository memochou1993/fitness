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
                ],
            ],
        ])->assertStatus(200);
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
                ],
            ],
        ])->assertStatus(200);
    }
}
