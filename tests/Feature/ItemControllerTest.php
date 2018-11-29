<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ItemControllerTest extends TestCase
{
    /**
     *
     *
     *
     */
    public function setUp()
    {
        parent::setUp();
    }

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
                        'key' => 'key'
                    ],
                ],
            ]);
    }

    /**
     *
     *
     *
     */
    public function tearDown()
    {
        parent::tearDown();
    }
}
