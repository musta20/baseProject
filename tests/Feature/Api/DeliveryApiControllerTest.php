<?php

// tests/Feature/Admin/DeliveryApiControllerTest.php

use App\Enums\UserRole;
use App\Models\Delivery;
use App\Models\User;
use Database\Seeders\SeederData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Pest\Laravel;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->withRole(UserRole::Admin->value)->create();
});

it('can list all deliveries', function () {
    $delivery = SeederData::$delivery;

    Laravel\actingAs($this->user)
        ->get(route('api.admin.deliveries.index'))
        ->assertStatus(200)
        ->assertJsonCount(count($delivery), 'data');
});

it('can create a new delivery', function () {
    $data = [
        'name' => 'New Delivery Method',
    ];

    Laravel\actingAs($this->user)
        ->post(route('api.admin.deliveries.store'), $data)
        ->assertStatus(201)
        ->assertJson([
            'message' => 'Delivery created successfully',
            'delivery' => $data,
        ]);

    $this->assertDatabaseHas('delivery', $data);
});

it('can show a specific delivery', function () {
    $delivery = Delivery::factory()->create();

    Laravel\actingAs($this->user)
        ->get(route('api.admin.deliveries.show', $delivery))
        ->assertStatus(200)
        ->assertJson([
            'id' => $delivery->id,
            'name' => $delivery->name,
        ]);
});

it('can update an existing delivery', function () {
    $delivery = Delivery::factory()->create();
    $data = [
        'name' => 'Updated Delivery Method',
    ];

    Laravel\actingAs($this->user)
        ->putJson(route('api.admin.deliveries.update', $delivery), $data)
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Delivery updated successfully',
            'delivery' => $data,
        ]);

    $this->assertDatabaseHas('delivery', $data);
});

it('can delete a delivery', function () {
    $delivery = Delivery::factory()->create();

    Laravel\actingAs($this->user)
        ->delete(route('api.admin.deliveries.destroy', $delivery))
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Delivery deleted successfully',
        ]);

    $this->assertDatabaseMissing('delivery', ['id' => $delivery->id]);
});

it('validates required fields when creating a delivery', function () {
    Laravel\actingAs($this->user)
        ->postJson(route('api.admin.deliveries.store'), [])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['name']);
});

it('validates required fields when updating a delivery', function () {
    $delivery = Delivery::factory()->create();

    Laravel\actingAs($this->user)
        ->putJson(route('api.admin.deliveries.update', $delivery), [])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['name']);
});
