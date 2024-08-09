<?php

// tests/Feature/Admin/CategoryApiControllerTest.php

use App\Enums\UserRole;
use App\Models\Category;
use App\Models\User;
use Database\Seeders\SeederData;
use Pest\Laravel;

beforeEach(function () {
    //$this->user = User::factory()->create();
    //$this->user->givePermissionTo('Category/Services');

    $this->user = User::factory()->withRole(UserRole::Admin->value)->create();
    // $this->actingAs($user);

});

it('can list all categories', function () {
    // Category::factory(3)->create();
    $categorys = SeederData::$arabicCategories;
    $response = Laravel\actingAs($this->user)
        ->get(route('api.admin.categories.index'));
    $response->assertStatus(200)
        ->assertJsonCount(count($categorys), 'data');
});

it('can create a new category', function () {
    $data = [
        'title' => 'New Category',
        'des' => 'This is a new category.',
        'icon' => 'category-icon.svg',
    ];

    Laravel\actingAs($this->user)
        ->post(route('api.admin.categories.store'), $data)
        ->assertStatus(201)
        ->assertJson([
            'message' => 'Category created successfully',
            'category' => $data,
        ]);

    $this->assertDatabaseHas('category', $data);
});

it('can show a specific category', function () {
    $category = Category::factory()->create();

    Laravel\actingAs($this->user)
        ->get(route('api.admin.categories.show', $category))
        ->assertStatus(200)
        ->assertJson([
            'id' => $category->id,
            'title' => $category->title,
            'des' => $category->des,
            'icon' => $category->icon,
        ]);
});

it('can update an existing category', function () {
    $category = Category::factory()->create();
    $data = [
        'title' => 'Updated Category',
        'des' => 'This is the updated category.',
        'icon' => 'updated-category-icon.svg',
    ];

    Laravel\actingAs($this->user)
        ->put(route('api.admin.categories.update', $category), $data)
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Category updated successfully',
            'category' => $data,
        ]);

    $this->assertDatabaseHas('category', $data);
});

it('can delete a category', function () {
    $category = Category::factory()->create();

    Laravel\actingAs($this->user)
        ->delete(route('api.admin.categories.destroy', $category))
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Category deleted successfully',
        ]);

    $this->assertDatabaseMissing('category', ['id' => $category->id]);
});
