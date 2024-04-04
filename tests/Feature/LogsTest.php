<?php


namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\User;
use Tests\TestCase;
use App\Models\Activity;

class LogsTest extends TestCase
{

    public function test_it_shows_all_logs_for_authenticated_user()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        Activity::factory()->count(3)->create();

        $response = $this->get(route('admin.Logs.index'));

        $response->assertOk();
        $response->assertViewIs('admin.Logs.index');
        $response->assertViewHas('AllLogs');
    }

    public function test_it_shows_logs_for_specific_user()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $otherUser = User::factory()->create();
        Activity::factory()->count(3)->create(['causer_id' => $otherUser->id]);

        $response = $this->get(route('admin.LogsList', $otherUser));

        $response->assertOk();
        $response->assertViewIs('admin.Logs.list');
        $response->assertViewHas('AllLogs');
        $response->assertViewHas('user', $otherUser);
    }
   
    public function test_it_shows_a_specific_log()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $log = Activity::factory()->create();

        $response = $this->get(route('admin.Logs.show', $log));

        $response->assertOk();
        $response->assertViewIs('admin.Logs.show');
        $response->assertViewHas('log', $log);
    }

    // Unhappy Paths

    public function test_it_redirects_unauthenticated_user_to_login_page()
    {
        $response = $this->get(route('admin.Logs.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_it_shows_404_for_non_existent_log()
    {
         $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $response = $this->get(route('admin.Logs.show', 999));

        $response->assertNotFound();
    }
}

?>