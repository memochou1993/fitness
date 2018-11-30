<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
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
        ])->json('GET', '/api/users/me', [
            //
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'data' => [
                    [
                        'key' => 'key',
                        'name' => 'Test User',
                    ],
                ],
            ]);
    }
}
