<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\Category;
use App\Models\User;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test listing categories.
     *
     * @test
     */
    public function index_shows_paginated_categories(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        category::factory()->count(15)->create();

        $response = $this->get(route('admin.Category.index'));

        $response->assertOk();
        $response->assertViewIs('admin.category.index');
        $response->assertViewHas('allcategory');
        $this->assertCount(10, $response->viewData('allcategory'));
    }

    /**
     * Test creating a new category.
     *
     * @test
     */
    public function store_creates_a_new_category(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

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
     *
     * @test
     */
    public function update_modifies_a_category(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

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
     *
     * @test
     */
    public function destroy_removes_a_category(): void
    {
        $user = User::factory()->withRole(UserRole::Admin->value)->create();
        $this->actingAs($user);

        $category = category::factory()->create();

        $response = $this->delete(route('admin.Category.destroy', $category));

        $response->assertRedirect(route('admin.Category.index'));
        $this->assertDatabaseMissing('category', ['id' => $category->id]);
    }
}
