<?php

namespace Tests;

use Artisan;
use App\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    /**
     *
     *
     *
     */
    protected function setUp()
    {
        parent::setUp();

        Artisan::call('db:seed');

        Passport::actingAs(
            User::find(1)
        );
    }

    /**
     *
     *
     *
     */
    protected function tearDown()
    {
        parent::tearDown();
    }
}
