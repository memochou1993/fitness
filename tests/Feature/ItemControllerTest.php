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
        ])->json('GET', '/api/items/' . config('seeds.items.key'), [
            //
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seeds.items.key'),
                    'name' => config('seeds.items.name'),
                    'unit' => config('seeds.items.unit'),
                ],
            ],
        ])->assertStatus(200);
    }
}
