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

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seed.item.key'),
                    'name' => config('seed.item.name'),
                    'unit' => config('seed.item.unit'),
                ],
            ],
        ])->assertStatus(200);
    }
}
