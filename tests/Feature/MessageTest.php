<?php


namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\User;
use Tests\TestCase;
use App\Models\message;

class MessageTest extends TestCase
{
   

    public function test_it_shows_inbox_messages()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $user2 = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        message::factory()->count(3)->create([
            'from' => $user2->id,
            'to' => $user->id
        ]);

        $response = $this->get(route('admin.inbox', 1));

        $response->assertOk();
        $response->assertViewIs('admin.messages.index');
        $response->assertViewHas('Messages');
        $response->assertViewHas('type', 1);
    }

    public function test_it_shows_sent_messages()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $user2 = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        message::factory()->count(3)->create([
            'to' => $user2->id,
            'from' => $user->id
        ]);

        $response = $this->get(route('admin.inbox', 2));

        $response->assertOk();
        $response->assertViewIs('admin.messages.index');
        $response->assertViewHas('Messages');
        $response->assertViewHas('type', 2);
    }

    public function test_it_shows_create_message_form()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $response = $this->get(route('admin.Messages.create'));

        $response->assertOk();
        $response->assertViewIs('admin.messages.add');
    }

    public function test_it_stores_a_new_message()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $recipient = User::factory()->withRole(UserRole::Admin->value)->create();

        $data = [
            'title' => 'Test Message',
            'message' => 'This is a test message.',
            'to' => $recipient->id,
        ];

        $response = $this->post(route('admin.Messages.store'), $data);

        $response->assertRedirect(route('admin.inbox', 1));
        $this->assertDatabaseHas('message', $data);
    }

    public function test_it_shows_a_specific_message()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $user2 = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $message = message::factory()->create([
            'from' => $user->id,
            'to' => $user2->id
            
        ]);

        $response = $this->get(route('admin.Messages.show', $message));

        $response->assertOk();
        $response->assertViewIs('admin.messages.show');
        $response->assertViewHas('message', $message);
    }

    public function test_it_deletes_a_message()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $user2 = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $message = message::factory()->create([
            'from' => $user->id ,
            'to' => $user2->id
        ]);

        $response = $this->delete(route('admin.Messages.destroy', $message));

        $response->assertRedirect(route('admin.inbox', 1));
        $this->assertDatabaseMissing('message', $message->toArray());
    }

    // Unhappy Paths

    public function test_it_redirects_unauthenticated_user_to_login_page()
    {
        $response = $this->get(route('admin.Messages.index', 1));

        $response->assertRedirect(route('login'));
    }

    public function test_it_shows_error_for_unauthorized_message_access()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $message = message::factory()->create(); // Message not sent by or to the user

        $response = $this->get(route('admin.Messages.show', $message));

        $response->assertRedirect(route('admin.inbox', 1));
    }

    public function test_it_shows_404_for_non_existent_message()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $response = $this->get(route('admin.Messages.show', 999));

        $response->assertNotFound();
    }
}

