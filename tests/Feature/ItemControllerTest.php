<?php

namespace Tests\Feature;

use Tests\TestCase;

class ItemControllerTest extends TestCase
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
        ])->json('GET', '/api/items/key', [
            //
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'data' => [
                    [
                        'key' => 'key',
                        'name' => 'Test Item',
                    ],
                ],
            ]);
    }
}