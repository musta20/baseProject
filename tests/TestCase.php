<?php

namespace Tests;

use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;


abstract class TestCase extends BaseTestCase
{
     use RefreshDatabase;
     use CreatesApplication;

    protected function setUp(): void
    {

        parent::setUp();

        $this->withoutVite();

        $this->seed(TestSeeder::class);



    }
}