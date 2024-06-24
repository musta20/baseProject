<?php

namespace Tests\Feature;

use App\Enums\OrderStatus;
use App\Enums\UserRole;
use App\Models\order as Order;
use App\Models\services as Services;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * @test
     */
    public function showOrderList_shows_orders_by_status()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        // Create some orders with different statuses
        $service = Services::factory()->create();

        Order::factory()->count(5)->for($service)->create(['status' => OrderStatus::NEW_ORDER]);
        Order::factory()->count(3)->for($service)->create(['status' => OrderStatus::COMPLETED_ORDER]);

        // Test for new orders
        $response = $this->get('/admin/showOrderList/' . OrderStatus::NEW_ORDER->value);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewHas('AllOrder');
        $response->assertViewHas('title', 'الطلبات الجديدة');

        // Test for completed orders
        $response = $this->get('/admin/showOrderList/' . OrderStatus::COMPLETED_ORDER->value);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewHas('AllOrder');
        $response->assertViewHas('title', 'الطلبات المكتملة');
    }

    /**
     * @test
     */
    public function edit_shows_order_details_and_edit_form()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        // Create an order and a service
        $service = Services::factory()->create();
        $order = Order::factory()->for($user)->for($service)->create();

        // Get the response
        $response = $this->get('/admin/Order/' . $order->id . '/edit');

        // Assert the response is successful
        $response->assertStatus(Response::HTTP_OK);

        // Assert the view contains the order and related data
        $response->assertViewHas('order', $order);
        $response->assertViewHas('statusOrder');
        $response->assertViewHas('PayStatus');
    }

    /**
     * @test
     */
    public function update_updates_order_details()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        // Create an order

        $order = Order::factory()->create();

        // Update the order with valid data
        $data = [
            'time' => '2023-10-27 10:00:00',
            'cost' => 50,
            'status' => OrderStatus::ORDER_RECEIVED->value,
        ];
        $response = $this->put('/admin/Order/' . $order->id, $data);

        // Assert the response redirects with success message
        $response->assertRedirect('/admin/showOrderList/' . OrderStatus::ORDER_RECEIVED->value);
        $response->assertSessionHas('OkToast', 'تم تعديل العنصر');

        // Assert the order is updated
        $this->assertDatabaseHas('order', [
            'id' => $order->id,
            'time' => '2023-10-27 10:00:00',
            'payed' => $order->payed + 50,
            'status' => OrderStatus::ORDER_RECEIVED->value,
        ]);
    }

    /**
     * @test
     */
    public function update_fails_with_invalid_data()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        // Create an order
        $order = Order::factory()->create();

        // Update the order with invalid data
        $data = [
            'status' => 'invalid_status',
        ];
        $response = $this->put('/admin/Order/' . $order->id, $data);

        // Assert the response shows validation errors
        $response->assertSessionHasErrors('status');
    }

    /**
     * @test
     */
    public function destroy_cancels_an_order()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        // Create an order
        $order = Order::factory()->create();

        // Delete the order
        $response = $this->delete('/admin/Order/' . $order->id);

        // Assert the response redirects with success message
        $response->assertRedirect();
        $response->assertSessionHas('OkToast', 'تم حذف العنصر');

        // Assert the order is cancelled
        $this->assertDatabaseHas('order', [
            'id' => $order->id,
            'status' => OrderStatus::CANCLED_ORDER->value,
        ]);
    }
}
