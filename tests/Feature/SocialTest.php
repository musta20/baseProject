<?php

use App\Enums\UserRole;
use App\Models\Social as Social;
use App\Models\User;
use Tests\TestCase;

class SocialTest extends TestCase
{
    /**
     * @test
     */
    public function authenticated_user_can_view_social_links_list()
    {
        $this->authenticateUser();

        // Create some social links
        Social::factory()->count(3)->create();

        $response = $this->get('/admin/Social');

        $response->assertStatus(200);
        $response->assertViewIs('admin.setting.social.index');
        $response->assertViewHas('allsocial');
    }

    /**
     * @test
     */
    public function unauthenticated_user_cannot_view_social_links_list()
    {
        $response = $this->get('/admin/Social');

        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function authenticated_user_can_access_create_social_link_form()
    {
        $this->authenticateUser();

        $response = $this->get('/admin/Social/create');

        $response->assertStatus(200);
        $response->assertViewIs('admin.setting.social.add');
    }

    /**
     * @test
     */
    public function authenticated_user_can_create_a_social_link()
    {
        $this->authenticateUser();

        $data = [
            'img' => 'test-icon.png',
            'url' => 'https://example.com',
        ];

        $response = $this->post('/admin/Social', $data);

        $response->assertRedirect('/admin/Social');
        $response->assertSessionHas('OkToast', 'تم إضافة البيانات');
        $this->assertDatabaseHas('social', ['url' => 'https://example.com']);
    }

    /**
     * @test
     */
    public function authenticated_user_can_view_a_social_link()
    {
        $this->authenticateUser();

        $socialLink = Social::factory()->create();

        $response = $this->get('/admin/Social/' . $socialLink->id . '/edit');

        $response->assertStatus(200);
        $response->assertViewIs('admin.setting.social.edit');
        $response->assertViewHas('social', $socialLink);
    }

    /**
     * @test
     */
    public function authenticated_user_can_update_a_social_link()
    {
        $this->authenticateUser();

        $socialLink = Social::factory()->create();

        $data = [
            'img' => 'updated-icon.png',
            'url' => 'https://updated.com',
        ];

        $response = $this->put('/admin/Social/' . $socialLink->id, $data);

        $response->assertRedirect('/admin/Social');
        $response->assertSessionHas('OkToast', 'تم تعديل العنصر');
        $this->assertDatabaseHas('social', ['url' => 'https://updated.com']);
    }

    /**
     * @test
     */
    public function authenticated_user_can_delete_a_social_link()
    {
        $this->authenticateUser();

        $socialLink = Social::factory()->create();

        $response = $this->delete('/admin/Social/' . $socialLink->id);

        $response->assertRedirect('/admin/Social');
        $response->assertSessionHas('OkToast', 'تم حذف العنصر');
        $this->assertDatabaseMissing('social', ['id' => $socialLink->id]);
    }

    protected function authenticateUser()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        return $user;
    }

    // ... (Additional tests for error scenarios, etc.)
}
