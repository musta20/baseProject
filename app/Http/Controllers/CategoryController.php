<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a paginated listing of the category resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the latest categories from the database, paginated with 10 items per page.
        // The result is passed to the view "admin.category.index".
        // The view receives the variable name "allcategory" and its value is the paginated category collection.
        $allcategory = category::latest()->paginate(10);

        return view('admin.category.index', ['allcategory' => $allcategory]);

    }

    /**
     * Display the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // This function renders the view "admin.category.add" which is used to create a new category.
        // The view is returned and does not receive any variables.

        // Render the "admin.category.add" view.
        return view('admin.category.add');

    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\StoreCategoryRequest  $request  The request object containing the category data.
     * @return \Illuminate\Http\Response Redirects to the index page with a success message.
     */
    public function store(StoreCategoryRequest $request)
    {
        // Create a new category using the data from the request.

        // Extract the data from the request.
        $data = [
            'title' => $request->title,
            'des' => $request->des,
            'icon' => $request->icon,
        ];

        // Create a new category using the extracted data.
        category::create($data);

        // Redirect to the index page with a success message.
        return redirect()->route('admin.Category.index')->with('OkToast', 'تم إضافة البيانات');

    }

    /**
     * edit function - A description of the entire PHP function.
     *
     * @param  category  $Category  description
     * @return view
     */
    public function edit(category $Category)
    {
        return view('admin.category.edit', ['category' => $Category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $Category)
    {

        $Category->update([
            'title' => $request->title,
            'des' => $request->des,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.Category.index')->with('OkToast', 'تم تعديل العنصر');

    }

    /**
     * Delete a category from storage.
     *
     * @param  \App\Models\Category  $Category  The category to be deleted.
     * @return \Illuminate\Http\Response A redirect response to the admin category index page with a success message.
     */
    public function destroy(category $Category)
    {
        // Delete the specified category from storage.
        $Category->delete();

        return redirect()->route('admin.Category.index')->with('OkToast', 'تم حذف العنصر');
    }
}
