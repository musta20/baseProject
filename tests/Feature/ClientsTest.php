<?php

use App\Enums\CommentStatus;
use App\Enums\UserRole;
use App\Models\clients;
use App\Models\User;
use Tests\TestCase;

class ClientsTest extends TestCase
{
    /**
     * Test listing clients.
     */
    public function test_index_shows_filtered_and_paginated_clients(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);
        
        clients::factory()->count(15)->create();

        $response = $this->get(route('admin.Clients.index'));

        $response->assertOk();
        $response->assertViewIs('admin.client.index');
        $response->assertViewHas('client');
        $response->assertViewHas('filterBox');
        $this->assertCount(10, $response->viewData('client'));
    }

    /**
     * Test editing a client.
     */
    public function test_edit_shows_client_and_status_options(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $client = clients::factory()->create();

        $response = $this->get(route('admin.Clients.edit', $client));

        $response->assertOk();
        $response->assertViewIs('admin.client.edit');
        $response->assertViewHas('client');
        $response->assertViewHas('statusoption');
        $this->assertEquals(CommentStatus::cases(), $response->viewData('statusoption'));
    }

    /**
     * Test updating a client's status.
     */
    public function test_update_modifies_client_status(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $client = clients::factory()->create();
        $newStatus = CommentStatus::HIDDEN->value;

        $response = $this->put(route('admin.Clients.update', $client), ['status' => $newStatus]);

        $response->assertRedirect(route('admin.Clients.index'));
        $this->assertDatabaseHas('clients', ['id' => $client->id, 'status' => $newStatus]);
    }

    /**
     * Test deleting a client.
     */
    public function test_destroy_removes_a_client(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);
        
        $client = clients::factory()->create();

        $response = $this->delete(route('admin.Clients.destroy', $client));

        $response->assertRedirect(route('admin.Clients.index'));
        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}


?>