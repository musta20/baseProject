<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\jobs as Jobs;
use App\Models\User;
use Tests\TestCase;

class JobsTest extends TestCase
{

    public function test_it_lists_all_jobs()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        Jobs::factory()->count(3)->create();

        $response = $this->get(route('admin.Jobs.index'));

        $response->assertOk();
        $response->assertViewIs('admin.jobs.index');
        $response->assertViewHas('alljobs');
    }

    public function test_it_shows_create_job_form()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $response = $this->get(route('admin.Jobs.create'));

        $response->assertOk();
        $response->assertViewIs('admin.jobs.add');
    }

    public function test_it_stores_a_new_job()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $data = Jobs::factory()->make()->toArray();

        $response = $this->post(route('admin.Jobs.store'), $data);

        $response->assertRedirect(route('admin.Jobs.index'));
        $this->assertDatabaseHas('jobs', $data);
    }

    public function test_it_shows_edit_job_form()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $job = Jobs::factory()->create();

        $response = $this->get(route('admin.Jobs.show', $job));

        $response->assertOk();
        $response->assertViewIs('admin.jobs.edit');
        $response->assertViewHas('Jobs');
    }

    public function test_it_updates_a_job()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $job = Jobs::factory()->create();

        $data = [
            'title' => 'Updated Title',
            'des' => 'Updated Description',
            'job_cities_id' => $job->job_cities_id,
        ];

        $response = $this->put(route('admin.Jobs.update', $job), $data);

        $response->assertRedirect(route('admin.Jobs.index'));
        $this->assertDatabaseHas('jobs', $data);
    }

    public function test_it_deletes_a_job()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $job = Jobs::factory()->create();

        $response = $this->delete(route('admin.Jobs.destroy', $job));

        $response->assertRedirect(route('admin.Jobs.index'));
        $this->assertDatabaseMissing('jobs', $job->toArray());
    }
}