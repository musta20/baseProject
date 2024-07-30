<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CategoryApiController extends Controller
{
    /**
     * Display a paginated listing of the category resource.
     */
    public function index(): JsonResponse
    {
        $categories = Category::latest()->paginate(10);

        return response()->json($categories);
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  StoreCategoryRequest  $request  The request object containing the category data.
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $data = $request->only(['title', 'des', 'icon']);
        $category = Category::create($data);

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category): JsonResponse
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $data = $request->only(['title', 'des', 'icon']);
        $category->update($data);

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category,
        ]);
    }

    /**
     * Delete a category from storage.
     *
     * @param  Category  $category  The category to be deleted.
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
        ]);
    }
}
