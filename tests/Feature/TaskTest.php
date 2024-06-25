<?php

use App\Enums\TaskStatus;
use App\Enums\UserRole;
use App\Models\Files;
use App\Models\Tasks;
use App\Models\User;
use Tests\TestCase;

class TaskTest extends TestCase
{
    // Tests for Admin Users

    /**
     * @test
     */
    public function admin_can_view_task_list()
    {
        $this->authenticateUser();
        // ... (Create tasks and users)

        $response = $this->get('/admin/Task');

        $response->assertStatus(200);
        $response->assertViewIs('admin.Tasks.index');
        $response->assertViewHas('alltask');
        $response->assertViewHas('option', TaskStatus::cases());
    }

    /**
     * @test
     */
    public function admin_can_create_a_task()
    {
        $this->authenticateUser();
        $user = User::factory()->create();

        $data = [
            'title' => 'Test Task',
            'des' => 'Test Description',
            'user_id' => $user->id,
            'start' => now()->format('Y-m-d'),
            'end' => now()->addDays(7)->format('Y-m-d'),
            // ... (Other fields and files)
        ];

        $response = $this->post('/admin/Task', $data);

        $response->assertRedirect('/admin/Task');
        $response->assertSessionHas('OkToast', 'تم إضافة البيانات');
        $this->assertDatabaseHas('tasks', ['title' => 'Test Task']);
    }

    /**
     * @test
     */
    public function admin_can_edit_a_task()
    {
        $this->authenticateUser();
        // ... (Create task and files)
        $task = Tasks::factory()->create();
        $response = $this->get('/admin/Task/' . $task->id . '/edit');

        $response->assertStatus(200);
        $response->assertViewIs('admin.Tasks.edit');
        $response->assertViewHas('task', $task);
        $response->assertViewHas('files');
        $response->assertViewHas('option', TaskStatus::cases());
    }

    // ... (Similar tests for update, destroy, and other admin actions)

    // Tests for Regular Users

    /**
     * @test
     */
    public function user_can_view_their_tasks()
    {
        $user = $this->authenticateUser();
        // ... (Create tasks for the user)

        $response = $this->get('/admin/mainTask');

        $response->assertStatus(200);
        $response->assertViewIs('admin.Tasks.mainTask');
        // ... (Assert that only the user's tasks are displayed)
    }

    /**
     * @test
     */
    public function user_can_view_a_task_assigned_to_them()
    {
        $user = $this->authenticateUser();
        $task = Tasks::factory()->for($user)->create();

        $response = $this->get('/admin/showTask/' . $task->id);

        $response->assertStatus(200);
        $response->assertViewIs('admin.Tasks.showTask');
        $response->assertViewHas('task', $task);
    }

    /**
     * @test
     */
    public function user_cannot_view_a_task_not_assigned_to_them()
    {
        $this->authenticateUser();
        // ... (Create a task assigned to another user)
        $user = User::factory()->create();
        $task = Tasks::factory()->for($user)->create();

        $response = $this->get('/admin/showTask/' . $task->id);

        $response->assertRedirect('/admin/Task');
        $response->assertSessionHas('OkToast', 'حدث خطاء');
    }

    protected function authenticateUser()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        return $user;
    }

    // ... (Similar tests for edit, update, and other user actions)
}
