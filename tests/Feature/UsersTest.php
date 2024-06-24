<?php

use App\Enums\UserRole;
use App\Models\Role;
use App\Models\User;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    // Tests for Admin Users

    /**
     * @test
     */
    public function admin_can_view_users_list()
    {
        $admin = $this->authenticateUser();
        // ... (Create users and roles)

        $response = $this->get('/admin/UsersList');

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.index');
        $response->assertViewHas('Users');
        $response->assertViewHas('allRole');
    }

    /**
     * @test
     */
    public function admin_can_access_create_user_form()
    {
        $admin = $this->authenticateUser();
        // ... (Create roles)

        $response = $this->get('/admin/Users/create');

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.add');
        $response->assertViewHas('role');
    }

    /**
     * @test
     */
    public function admin_can_create_a_user()
    {
        $this->authenticateUser();

        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'role' => Role::first()->id,
            // ... (Other fields and image)
        ];

        $response = $this->post('/admin/createUser', $data);

        $response->assertRedirect('/admin/UsersList');
        $response->assertSessionHas('OkToast', 'تم إضافة المستخدم');
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    /**
     * @test
     */
    public function admin_can_edit_a_user()
    {
        $admin = $this->authenticateUser();
        $user = User::factory()->create();
        // ... (Create roles)

        $response = $this->get('/admin/Users/' . $user->id . '/edit');

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.edit');
        $response->assertViewHas('user', $user);
        $response->assertViewHas('role');
    }

    // ... (Similar tests for update, destroy, and other admin actions)

    // Tests for Role and Permission Management

    /**
     * @test
     */
    public function admin_can_view_roles_list()
    {
        $admin = $this->authenticateUser();
        // ... (Create roles)

        $response = $this->get('/admin/indexrole');

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.role.index');
        $response->assertViewHas('role');
    }

    protected function authenticateUser($role = null)
    {

        $user = User::factory()->withRole($role ?? UserRole::Admin->value)->create();
        $this->actingAs($user);

        return $user;
    }
}
