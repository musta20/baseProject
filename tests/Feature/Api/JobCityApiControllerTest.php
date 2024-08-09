<?php

// tests/Feature/Admin/JobCityApiControllerTest.php

use App\Enums\UserRole;
use App\Models\Jobcity;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Pest\Laravel;
use Symfony\Component\HttpFoundation\Response;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->withRole(UserRole::Admin->value)->create();
});

it('can list all job cities', function () {
    Jobcity::factory(3)->create();

    Laravel\actingAs($this->user)
        ->getJson(route('api.admin.job-cities.index'))
        ->assertStatus(200)
        ->assertJsonCount(3, 'data');
});

it('can create a new job city', function () {
    $data = [
        'name' => 'New Job City',
        // Add other required fields here
    ];

    Laravel\actingAs($this->user)
        ->postJson(route('api.admin.job-cities.store'), $data)
        ->assertStatus(Response::HTTP_CREATED)
        ->assertJson([
            'message' => 'Job city created successfully',
            'jobCity' => $data,
        ]);

    $this->assertDatabaseHas('job_cities', $data);
});

it('can show a specific job city', function () {
    $jobCity = Jobcity::factory()->create();

    Laravel\actingAs($this->user)
        ->getJson(route('api.admin.job-cities.show', $jobCity))
        ->assertStatus(200)
        ->assertJson($jobCity->toArray());
});

it('can update an existing job city', function () {
    $jobCity = Jobcity::factory()->create();
    $data = [
        'name' => 'Updated Job City',
        // Add other fields that can be updated
    ];

    Laravel\actingAs($this->user)
        ->putJson(route('api.admin.job-cities.update', $jobCity), $data)
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Job city updated successfully',
            'jobCity' => $data,
        ]);

    $this->assertDatabaseHas('job_cities', $data);
});

it('can delete a job city', function () {
    $jobCity = Jobcity::factory()->create();

    Laravel\actingAs($this->user)
        ->deleteJson(route('api.admin.job-cities.destroy', $jobCity))
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Job city deleted successfully',
        ]);

    $this->assertDatabaseMissing('job_cities', ['id' => $jobCity->id]);
});

it('validates required fields when creating a job city', function () {
    Laravel\actingAs($this->user)
        ->postJson(route('api.admin.job-cities.store'), [])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['name']); // Add other required fields here
});

it('validates required fields when updating a job city', function () {
    $jobCity = Jobcity::factory()->create();

    Laravel\actingAs($this->user)
        ->putJson(route('api.admin.job-cities.update', $jobCity), [])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['name']); // Add other required fields here
});
