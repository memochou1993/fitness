<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

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
            'data' => [
                [
                    'key' => config('seeds.categories.key'),
                    'name' => config('seeds.categories.name'),
                ],
            ],
        ])->assertStatus(200);
    }
}
