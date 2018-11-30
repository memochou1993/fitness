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
        ])->json('GET', '/api/categories/' . config('seeds.categories.key'), [
            //
        ]);

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seeds.categories.key'),
                    'name' => config('seeds.categories.name'),
                ],
            ],
        ])->assertStatus(200);
    }
}
