<?php

use App\Enums\UserRole;
use App\Models\Category as Category;
use App\Models\Delivery as Delivery;
use App\Models\payment as Payment;
use App\Models\Services as Services;
use App\Models\User;
use Tests\TestCase;

class ServicesTest extends TestCase
{
    /**
     * @test
     */
    public function authenticated_user_can_view_services_list()
    {
        $user = $this->authenticateUser();

        // Create some services and categories
        Category::factory()->count(3)->create();
        Services::factory()->count(5)->create();

        $response = $this->get('/admin/Services');

        $response->assertStatus(200);
        $response->assertViewIs('admin.services.index');
        $response->assertViewHas('allServices');
    }

    /**
     * @test
     */
    public function unauthenticated_user_cannot_view_services_list()
    {
        $response = $this->get('/admin/Services');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function authenticated_user_can_access_create_service_form()
    {
        $user = $this->authenticateUser();

        // Create some categories, payments, and deliveries
        Category::factory()->count(2)->create();
        Payment::factory()->count(2)->create();
        Delivery::factory()->count(2)->create();

        $response = $this->get('/admin/Services/create');

        $response->assertStatus(200);
        $response->assertViewIs('admin.services.add');
        $response->assertViewHas('cat');
        $response->assertViewHas('dev');
        $response->assertViewHas('pym');
    }

    /**
     * @test
     */
    public function authenticated_user_can_create_a_service()
    {
        $user = $this->authenticateUser();

        // Create a category
        $category = Category::factory()->create();

        $data = [
            'name' => 'Test Service',
            'price' => 100,
            'icon' => 'test-icon.png',
            'category_id' => $category->id,
            'pys' => [],
            'devs' => [],
            'files' => [],
        ];

        $response = $this->post('/admin/Services', $data);

        $response->assertRedirect('/admin/Services');
        $response->assertSessionHas('OkToast', 'تم إضافة البيانات');
        $this->assertDatabaseHas('services', ['name' => 'Test Service']);
    }

    protected function authenticateUser()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        return $user;
    }

    // ... (Similar tests for edit, update, and destroy methods with authentication)
}
