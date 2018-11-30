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
                    'key' => config('seed.category.key'),
                    'name' => config('seed.category.name'),
                ],
            ],
        ])->assertStatus(200);
    }
}
