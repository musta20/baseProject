<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\payment as Payment;
use App\Models\User;
use Tests\TestCase;

class PaymentTest extends TestCase
{

    public function test_authenticated_user_can_view_payment_list()
    {
        // Create a user and authenticate
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        // Create some payments
        Payment::factory()->count(3)->create();

        // Get the response
        $response = $this->get('/admin/Payment');

        // Assert the response is successful and contains the payments
        $response->assertStatus(200);
        $response->assertViewHas('payment');
    }

    public function test_unauthenticated_user_cannot_view_payment_list()
    {
        // Get the response without authentication
        $response = $this->get('/admin/Payment');

        // Assert the user is redirected to the login page
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_create_payment_form()
    {
        // Create a user and authenticate
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        // Get the response
        $response = $this->get('/admin/Payment/create');

        // Assert the response is successful
        $response->assertStatus(200);
    }

    // ... (Similar tests for store, edit, update, and destroy methods with authentication)
}