<?php

namespace Tests\Feature;

use App\Models\category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;



    /**
     * Test listing categories.
     */
    public function test_index_shows_paginated_categories(): void
    {
        category::factory()->count(15)->create();

        $response = $this->get(route('admin.Category.index'));

        $response->assertOk();
        $response->assertViewIs('admin.category.index');
        $response->assertViewHas('allcategory');
        $this->assertCount(10, $response->viewData('allcategory'));
    }

    /**
     * Test creating a new category.
     */
    public function test_store_creates_a_new_category(): void
    {
        $data = [
            'title' => 'Test Category',
            'des' => 'This is a test category.',
            'icon' => 'test-icon',
        ];

        $response = $this->post(route('admin.Category.store'), $data);

        $response->assertRedirect(route('admin.Category.index'));
        $this->assertDatabaseHas('category', $data);
    }

    /**
     * Test updating a category.
     */
    public function test_update_modifies_a_category(): void
    {
        $category = category::factory()->create();

        $data = [
            'title' => 'Updated Category',
            'des' => 'This is an updated category.',
            'icon' => 'updated-icon',
        ];

        $response = $this->put(route('admin.Category.update', $category), $data);

        $response->assertRedirect(route('admin.Category.index'));
        $this->assertDatabaseHas('category', $data);
    }

    /**
     * Test deleting a category.
     */
    public function test_destroy_removes_a_category(): void
    {
        $category = category::factory()->create();

        $response = $this->delete(route('admin.Category.destroy', $category));

        $response->assertRedirect(route('admin.Category.index'));
        $this->assertDatabaseMissing('category', ['id' => $category->id]);
    }
}
