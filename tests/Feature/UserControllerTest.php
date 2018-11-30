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

        $response->assertJson([
            'status' => 'success',
            'data' => [
                [
                    'key' => config('seed.user.key'),
                    'name' => config('seed.user.name'),
                    'sex' => config('seed.user.sex'),
                    'age' => config('seed.user.age'),
                    'height' => config('seed.user.height'),
                    'weight' => config('seed.user.weight'),
                    'email' => config('seed.user.email'),
                ],
            ],
        ])->assertStatus(200);
    }
}
