<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

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
            'data' => [
                [
                    'key' => config('seeds.users.key'),
                    'name' => config('seeds.users.name'),
                    'sex' => config('seeds.users.sex'),
                    'age' => config('seeds.users.age'),
                    'height' => config('seeds.users.height'),
                    'weight' => config('seeds.users.weight'),
                    'email' => config('seeds.users.email'),
                ],
            ],
        ])->assertStatus(200);
    }
}
