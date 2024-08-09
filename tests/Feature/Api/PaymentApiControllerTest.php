<?php

// tests/Feature/Admin/PaymentApiControllerTest.php

use App\Enums\UserRole;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Pest\Laravel;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user  = User::factory()->withRole(UserRole::Admin->value)->create();
    // $this->user->givePermissionTo('Category/Services');
});

it('can list all payment methods', function () {
    Payment::factory(3)->create();

    Laravel\actingAs($this->user)
        ->get(route('api.admin.payments.index'))
        ->assertStatus(200)
        ->assertJsonCount(3, 'data');
});

it('can create a new payment method', function () {
    $data = [
        'name' => 'New Payment Method',
    ];

    Laravel\actingAs($this->user)
        ->post(route('api.admin.payments.store'), $data)
        ->assertStatus(201)
        ->assertJson([
            'message' => 'Payment method added successfully',
            'payment' => $data,
        ]);

    $this->assertDatabaseHas('payments', $data);
});

it('can show a specific payment method', function () {
    $payment = Payment::factory()->create();

    Laravel\actingAs($this->user)
        ->get(route('api.admin.payments.show', $payment))
        ->assertStatus(200)
        ->assertJson([
            'id' => $payment->id,
            'name' => $payment->name,
        ]);
});

it('can update an existing payment method', function () {
    $payment = Payment::factory()->create();
    $data = [
        'name' => 'Updated Payment Method',
    ];

    Laravel\actingAs($this->user)
        ->put(route('api.admin.payments.update', $payment), $data)
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Payment method updated successfully',
            'payment' => $data,
        ]);

    $this->assertDatabaseHas('payments', $data);
});

it('can delete a payment method', function () {
    $payment = Payment::factory()->create();

    Laravel\actingAs($this->user)
        ->delete(route('api.admin.payments.destroy', $payment))
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Payment method deleted successfully',
        ]);

    $this->assertDatabaseMissing('payments', ['id' => $payment->id]);
});

it('validates required fields when creating a payment method', function () {
   $response = Laravel\actingAs($this->user)
        ->postJson(route('api.admin.payments.store'), []);
        $response->assertStatus(422)
        ->assertJsonValidationErrors(['name']);
});

it('validates required fields when updating a payment method', function () {
    $payment = Payment::factory()->create();

    Laravel\actingAs($this->user)
        ->putJson(route('api.admin.payments.update', $payment), [])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['name']);
});