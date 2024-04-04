<?php

use App\Enums\UserRole;
use App\Models\CustmerSlide;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CustmerSlideT extends TestCase
{
 
    /**
     * Test listing customer slides.
     */
    public function test_index_shows_paginated_customer_slides(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);
        
        CustmerSlide::factory()->count(15)->create();

        $response = $this->get(route('admin.CustmerSlide.index'));

        $response->assertOk();
        $response->assertViewIs('admin.setting.CustmerSlide.index');
        $response->assertViewHas('CustmerSlide');
        $this->assertCount(10, $response->viewData('CustmerSlide'));
    }

    /**
     * Test creating a new customer slide.
     */
    public function test_store_creates_a_new_customer_slide(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        Storage::fake('public');

        $file = UploadedFile::fake()->image('test_image.jpg');

        $response = $this->post(route('admin.CustmerSlide.store'), [
            'img' => $file,
            'url' => 'https://example.com',
        ]);

        $response->assertRedirect(route('admin.CustmerSlide.index'));

        $slide = CustmerSlide::first();
        $this->assertNotNull($slide);
        $this->assertFileExists(Storage::disk('public')->path($slide->img));
    }

    /**
     * Test updating a customer slide.
     */
    public function test_update_modifies_a_customer_slide(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        Storage::fake('public');

        $slide = CustmerSlide::factory()->create();
        $file = UploadedFile::fake()->image('updated_image.jpg');

        $response = $this->put(route('admin.CustmerSlide.update', $slide), [
            'img' => $file,
            'url' => 'https://updated.com',
        ]);

        $response->assertRedirect(route('admin.CustmerSlide.index'));

        $slide = $slide->fresh();
        $this->assertEquals('https://updated.com', $slide->url);
        $this->assertFileExists(Storage::disk('public')->path($slide->img));
    }

    /**
     * Test deleting a customer slide.
     */
    public function test_destroy_removes_a_customer_slide(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);
        
        $slide = CustmerSlide::factory()->create();

        $response = $this->delete(route('admin.CustmerSlide.destroy', $slide));

        $response->assertRedirect(route('admin.CustmerSlide.index'));
        $this->assertDatabaseMissing('custmer_slides', ['id' => $slide->id]);
    }
}


?>