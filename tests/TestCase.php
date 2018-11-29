<?php

namespace Tests;

use Artisan;
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
