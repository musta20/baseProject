<?php

use App\Enums\UserRole;
use App\Models\delivery as Delivery;
use App\Models\User;
use Tests\TestCase;

class DeliveryTest extends TestCase
{
    /**
     * Test listing deliveries.
     */
    public function test_index_shows_paginated_deliveries(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        Delivery::factory()->count(15)->create();

        $response = $this->get(route('admin.Delivery.index'));

        $response->assertOk();

        $response->assertViewIs('admin.order.delivery.index');

        $response->assertViewHas('delivery');

        $this->assertCount(10, $response->viewData('delivery'));
    }

    /**
     * Test creating a new delivery.
     */
    public function test_store_creates_a_new_delivery(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $data = [
            'name' => 'Test Delivery',
        ];

        $response = $this->post(route('admin.Delivery.store'), $data);

        $response->assertRedirect(route('admin.Delivery.index'));

        $this->assertDatabaseHas('delivery', $data);
    }

    /**
     * Test editing a delivery.
     */
    public function test_edit_shows_delivery_details(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $delivery = Delivery::factory()->create();

        $response = $this->get(route('admin.Delivery.edit', $delivery));

        $response->assertOk();

        $response->assertViewIs('admin.order.delivery.edit');

        $response->assertViewHas('delivery');

    }

    /**
     * Test updating a delivery.
     */
    public function test_update_modifies_a_delivery(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);
        
        $delivery = Delivery::factory()->create();

        $data = [
            'name' => 'Updated Delivery',
        ];

        $response = $this->put(route('admin.Delivery.update', $delivery), $data);

        $response->assertRedirect(route('admin.Delivery.index'));
        $this->assertDatabaseHas('delivery', $data);
    }

    /**
     * Test deleting a delivery.
     */
    public function test_destroy_removes_a_delivery(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);
        
        $delivery = Delivery::factory()->create();

        $response = $this->delete(route('admin.Delivery.destroy', $delivery));

        $response->assertRedirect(route('admin.Delivery.index'));
        
        $this->assertDatabaseMissing('delivery', ['id' => $delivery->id]);
    }
}

?>