<?php

use App\Enums\UserRole;
use App\Models\Setting;
use App\Models\User;
use Tests\TestCase;

class SettingControllerTest extends TestCase
{

    protected function authenticateUser()
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);
        return $user;
    }

    public function test_authenticated_user_can_access_setting_main_page()
    {
        $this->authenticateUser();

        $response = $this->get('/admin/basic');

        $response->assertStatus(200);
        $response->assertViewIs('admin.setting.index');
    }

    public function test_unauthenticated_user_cannot_access_setting_main_page()
    {
        $response = $this->get('/admin/basic');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_setting_details()
    {
        $this->authenticateUser();

        // Create a setting record
       // Setting::factory()->create();

        $response = $this->get('/admin/basic');

        $response->assertStatus(200);
        $response->assertViewIs('admin.setting.index');
        $response->assertViewHas('setting');
    }

    public function test_authenticated_user_can_update_settings()
    {
        $user = $this->authenticateUser();

        // Create a setting record
        $setting = Setting::first();

        $data = [
            'title' => 'Updated Title',
            'des' => 'Updated Description',
            'keyword' => 'Updated Keywords',
            'logo' => 'updated-logo.png',
            'icon' => 'updated-icon.png',
            'email' => 'KQX5x@example.com',
            'phone' => '1234567890',
            'footer' => 'Updated Footer',
            'adress' => 'Updated Address',
            'map' => 'https://www.google.com/maps/search/olds+lad/@27.5248233,41.1334047,10z?hl=en',
            'copyright' => 'Updated Copyright',
            'footertext' => 'Updated Footer Text',
            'billterm' => 'Updated Bill Term',
            'terms' => 'Updated Terms',
            'weekwork' => 'Updated Week Work',
     
            // ... (Other setting fields)
        ];

        $response = $this->put('/admin/Setting/' . $setting->id, $data);

        $response->assertRedirect('/admin/basic');
        $response->assertSessionHas('OkToast', 'تم تعديل البيانات');
        $this->assertDatabaseHas('setting', ['title' => 'Updated Title']);
    }

    // ... (Additional tests for updating settings with file uploads, error scenarios, etc.)
}

?>