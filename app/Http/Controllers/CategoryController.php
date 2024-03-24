<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCategoryRequest;
use App\Http\Requests\updateCategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcategory = category::latest()->paginate(10);

        return view("admin.category.index",  ['allcategory' => $allcategory] );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.category.add" );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCategoryRequest  $request)
    {


    category::create($request);
   
    return redirect()->route('admin.Category.create')->with('messages','تم إضافة البيانات');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {

        return view("admin.category.edit",  ['category' => $category] );
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(updateCategoryRequest $request,Category $category)
    {

        $category->update([
        "title"=>$request->title,
        "des"=>$request->des,
        "icon"=>$request->icon,
        ]);

        
        return redirect()->route('admin.Category.index')->with('messages','تم تعديل العنصر');

        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category )
    {
       $category->delete();
       return redirect()->route('admin.Category.index')->with('messages','تم حذف العنصر');
    }
}
