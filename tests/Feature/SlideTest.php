<?php

use App\Enums\UserRole;
use App\Models\Slide as Slide;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SlideTest extends TestCase
{
    /**
     * @test
     */
    public function authenticated_user_can_view_slides_list()
    {
        $this->authenticateUser();

        // Create some slides
        Slide::factory()->count(3)->create();

        $response = $this->get('/admin/Slide');

        $response->assertStatus(200);
        // ... (Assert view name and data)
    }

    /**
     * @test
     */
    public function unauthenticated_user_cannot_view_slides_list()
    {
        $response = $this->get('/admin/Slide');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function authenticated_user_can_access_create_slide_form()
    {
        $this->authenticateUser();

        $response = $this->get('/admin/Slide/create');

        $response->assertStatus(200);
        // ... (Assert view name)
    }

    /**
     * @test
     */
    public function authenticated_user_can_create_a_slide()
    {
        $this->authenticateUser();

        $data = [
            'title' => 'Test Slide',
            'des' => 'Test Description',
            'url' => 'https://example.com',
            'img' => UploadedFile::fake()->image('slide.jpg'),
        ];

        $response = $this->post('/admin/Slide', $data);

        $response->assertRedirect('/admin/Slide');
        $response->assertSessionHas('OkToast', 'تم إضافة البيانات');
        $this->assertDatabaseHas('slide', ['title' => 'Test Slide']);
        // ... (Assert image storage)
    }

    /**
     * @test
     */
    public function authenticated_user_can_view_a_slide()
    {
        $this->authenticateUser();

        $slide = Slide::factory()->create();

        $response = $this->get('/admin/Slide/' . $slide->id);

        $response->assertStatus(200);
        $response->assertViewIs('admin.setting.slide.edit');
        $response->assertViewHas('slide', $slide);
    }

    /**
     * @test
     */
    public function authenticated_user_can_edit_a_slide()
    {
        $this->authenticateUser();

        $slide = Slide::factory()->create();

        $response = $this->get('/admin/Slide/' . $slide->id . '/edit');

        $response->assertStatus(200);
        $response->assertViewIs('admin.setting.slide.edit');
        $response->assertViewHas('slide', $slide);
    }

    /**
     * @test
     */
    public function authenticated_user_can_update_a_slide()
    {
        $this->authenticateUser();

        $slide = Slide::factory()->create();

        $data = [
            'title' => 'Updated Title',
            'des' => 'Updated Description',
            'url' => 'https://updated.com',
        ];

        $response = $this->put('/admin/Slide/' . $slide->id, $data);

        $response->assertRedirect('/admin/Slide');
        $response->assertSessionHas('OkToast', 'تم تعديل العنصر');
        $this->assertDatabaseHas('slide', ['title' => 'Updated Title']);
    }

    /**
     * @test
     */
    public function authenticated_user_can_delete_a_slide()
    {
        $this->authenticateUser();

        $slide = Slide::factory()->create();

        $response = $this->delete('/admin/Slide/' . $slide->id);

        $response->assertRedirect('/admin/Slide/');
        $response->assertSessionHas('OkToast', 'تم حذف العنصر');
        $this->assertDatabaseMissing('slide', ['id' => $slide->id]);
    }

    protected function authenticateUser()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        return $user;
    }

    // ... (Additional tests for updating with image uploads, error scenarios, etc.)
}
