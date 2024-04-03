<?php


namespace Tests\Feature;

use App\Models\job_app as JobApp;
use App\Models\jobs as Jobs;
use Tests\TestCase;

class JobAppControllerTest extends TestCase
{

    public function test_index_shows_job_applications_and_filter_box()
    {
        // Create some jobs and job applications

        Jobs::factory()->count(3)->create();
        JobApp::factory()->count(5)->create();

        // Get the response
        $response = $this->get('/admin/JobApp');

        // Assert the response is successful
        $response->assertStatus(200);

        // Assert the view contains the job applications and filter box
        $response->assertViewHas('alljopapp');
        $response->assertViewHas('filterBox');
    }

    public function test_show_displays_a_specific_job_application()
    {
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



?>