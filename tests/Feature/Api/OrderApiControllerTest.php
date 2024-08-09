<?php

// tests/Feature/Admin/OrderApiControllerTest.php

use App\Models\Order;
use App\Models\User;
use App\Models\Services;
use App\Models\Files;
use App\Enums\UserRole;
use App\Enums\OrderStatus;
use App\Enums\PayStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Pest\Laravel;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->withRole(UserRole::Admin->value)->create();
});

it('can list all orders', function () {
    Order::factory()->for($this->user)->count(3)->create();

   $response = Laravel\actingAs($this->user)
        ->getJson(route('api.admin.Order.index'));
         $response->assertStatus(200)
        ->assertJsonCount(3, 'data');
});

it('can show a specific order', function () {
    $order = Order::factory()->create();

    Laravel\actingAs($this->user)
        ->getJson(route('api.admin.Order.show', $order))
        ->assertStatus(200)
        ->assertJson($order->toArray());
});



it('can update an order', function () {
    $order = Order::factory()->create();
     $data = [
         'time' => now()->addDays(2),
        'cost' => 100,
        'status' => OrderStatus::ORDER_RECEIVED->value,
    ];
 

    Laravel\actingAs($this->user)
        ->putJson(route('api.admin.Order.update', $order), $data)
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Order updated successfully',
        ]);

        $this->assertDatabaseHas('order',[
        'id' => $order->id,
        'payed' => $data['cost'] + $order->payed,
    ]);


});

it('can cancel an order', function () {
    $order = Order::factory()->create();

    Laravel\actingAs($this->user)
        ->deleteJson(route('api.admin.Order.destroy', $order))
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Order cancelled successfully',
        ]);

    $this->assertDatabaseHas('order', [
        'id' => $order->id,
        'status' => OrderStatus::CANCLED_ORDER->value,
    ]);
});

