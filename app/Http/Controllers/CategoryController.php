<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public $rule = [
        "title" => "required|string|max:100|min:3",
        "des" => "required|string|max:255|min:3",
        "icon" => "required|string|max:255|min:3",
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'name.required' => 'يجب كتابة العنوان ',
            'name.string' => 'يجب ان يكون العنوان نص فقط',
            "name.max" => "يجب ان لا يزيد عنوان النص عن 25 حرف",
            "name.min" => "يجب ان لا يقل عنوان النص عن 3 حرف",

            'des.required' => 'يجب كتابة الوصف ',
            'des.string' => 'يجب ان يكون الوصف نص فقط',
            "des.max" => "يجب ان لا يزيد الوصف  عن 255 حرف",
            "des.min" => "يجب ان لا يقل عنوان النص عن 3 حرف",

            'icon.required' => 'يجب إضافة  ايقونة ',
            'icon.string' => 'يجب ان يكون الايقونة نص فقط',
            "icon.max" => "يجب ان لا يزيد  الايقونة عن 255 حرف",
            "icon.min" => "يجب ان لا يقل الايقونة النص عن 3 حرف",


        ];
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcategory = category::latest()->get();
       // dd( $allcategory);
       //Services
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
    public function store(Request $request)
    {

    $data = $request->validate( $this->rule,$this->messages());

    category::create($data);
   
    return redirect('/admin/Category/create')->with('messages','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = category::find($id);
        return view("admin.category.edit",  ['category' => $category] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);

        //category

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
       // dd($request);


        $data = $request->validate( $this->rule,$this->messages());
        $category = category::find($id);

        $category->title=$request->title;
        $category->des=$request->des;
        $category->icon=$request->icon;

        $category->save();

        return redirect('/admin/Category/')->with('messages','تم تعديل العنصر');

        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //CAT
       // category::deleting()
       $category = category::find($id);
       $category->delete();
       return redirect('/admin/Category/')->with('messages','تم حذف العنصر');
    }
}
