<?php

// tests/Feature/Admin/ServicesApiControllerTest.php

use App\Models\Services;
use App\Models\User;
use App\Models\RequiredFiles;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Delivery;
use App\Enums\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Pest\Laravel;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->withRole(UserRole::Admin->value)->create();
});

it('can list all services', function () {
    Services::factory(3)->create();

    Laravel\actingAs($this->user)
        ->getJson(route('api.admin.Services.index'))
        ->assertStatus(200)
        ->assertJsonStructure(['services']);
});

it('can create a new service', function () {
    $category = Category::factory()->create();
    $payments = Payment::factory(2)->create();
    $deliveries = Delivery::factory(2)->create();

    $data = [
        'name' => 'New Service',
        'price' => 100,
        'icon' => 'icon.png',
        'category_id' => $category->id,
        'files' => ['file1', 'file2'],
        'pys' => $payments->pluck('id')->toArray(),
        'devs' => $deliveries->pluck('id')->toArray(),
    ];

    Laravel\actingAs($this->user)
        ->postJson(route('api.admin.Services.store'), $data)
        ->assertStatus(201)
        ->assertJson([
            'message' => 'Service created successfully.',
            'service' => ['name' => 'New Service'],
        ]);

    $this->assertDatabaseHas('services', [
        'name' => 'New Service',
        'price' => 100,
        'icon' => 'icon.png',
        'category_id' => $category->id,
    ]);

    $this->assertDatabaseCount('required_files', 2);
    $this->assertDatabaseHas('required_files', ['name' => 'file1']);
    $this->assertDatabaseHas('required_files', ['name' => 'file2']);
});

it('can show a specific service', function () {
    $service = Services::factory()->create();

    Laravel\actingAs($this->user)
        ->getJson(route('api.admin.Services.show', $service))
        ->assertStatus(200)
        ->assertJson(['service' => $service->toArray()]);
});

it('can update an existing service', function () {
    $service = Services::factory()->create();
    $category = Category::factory()->create();
    $payments = Payment::factory(2)->create();
    $deliveries = Delivery::factory(2)->create();

    $data = [
        'name' => 'Updated Service',
        'price' => 200,
        'icon' => 'updated-icon.png',
        'category_id' => $category->id,
        'files' => ['file3', 'file4'],
        'pys' => $payments->pluck('id')->toArray(),
        'dev' => $deliveries->pluck('id')->toArray(),
    ];

    Laravel\actingAs($this->user)
        ->putJson(route('api.admin.Services.update', $service), $data)
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Service updated successfully.',
            'service' => ['name' => 'Updated Service'],
        ]);

    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'name' => 'Updated Service',
        'price' => 200,
        'icon' => 'updated-icon.png',
        'category_id' => $category->id,
    ]);

    $this->assertDatabaseCount('required_files', 2);
    $this->assertDatabaseHas('required_files', ['name' => 'file3']);
    $this->assertDatabaseHas('required_files', ['name' => 'file4']);
});

it('can delete a service', function () {
    $service = Services::factory()->create();

    Laravel\actingAs($this->user)
        ->deleteJson(route('api.admin.Services.destroy', $service))
        ->assertStatus(200)
        ->assertJson(['message' => 'Service deleted successfully.']);

    $this->assertDatabaseMissing('services', ['id' => $service->id]);
});

it('validates required fields when creating a service', function () {
    Laravel\actingAs($this->user)
        ->postJson(route('api.admin.Services.store'), [])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['name', 'price', 'category_id']);
});

 