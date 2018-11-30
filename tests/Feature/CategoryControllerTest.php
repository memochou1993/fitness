<?php

namespace Tests\Feature;

use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     *
     *
     * @return void
     */
    public function testShow()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->json('GET', '/api/categories/key', [
            //
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => 'key',
                    'name' => 'Test Category',
                ],
            ],
        ])->assertStatus(200);
    }
}
