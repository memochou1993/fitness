<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

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
            'data' => [
                [
                    'key' => config('seeds.items.key'),
                    'name' => config('seeds.items.name'),
                ],
            ],
        ])->assertStatus(200);
    }
}
