<?php

namespace Tests;

use App\Enums\UserRole;
use App\Models\User;
use Database\Seeders\TestSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public $user;

    protected function setUp(): void
    {
        parent::setUp();



                (new TestSeeder())->run();


                $this->user = User::factory()->create();
                $this->user->assignRole(UserRole::Admin->value);
                $this->actingAs($this->user);

        
    }

}
