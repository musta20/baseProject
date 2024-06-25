<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Jobapp as JobApp;
use App\Models\Jobs as Jobs;
use App\Models\User;
use Tests\TestCase;

class JobAppTest extends TestCase
{
    /**
     * @test
     */
    public function index_shows_Jobapplications_and_filter_box()
    {
        // Create some jobs and job applications

        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        Jobs::factory()->count(3)->create();
        JobApp::factory()->count(5)->create();

        // Get the response
        $response = $this->get('/admin/JobApp');

        // Assert the response is successful
        $response->assertStatus(200);

        // Assert the view contains the job applications and filter box
        $response->assertViewHas('alljopapp');
    }

    /**
     * @test
     */
    public function show_displays_a_specific_Jobapplication()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        // Create a job application
        $jobApp = JobApp::factory()->create();

        // Get the response
        $response = $this->get('/admin/JobApp/' . $jobApp->id);

        // Assert the response is successful
        $response->assertStatus(200);

        // Assert the view contains the job application
        $response->assertViewHas('job', $jobApp);
    }
}
