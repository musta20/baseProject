<?php

namespace App\Http\Controllers;

use App\Models\numbers;
use Illuminate\Http\Request;

class NumbersController extends Controller
{
    public $rule = [
        'title' => 'required|string|max:100|min:3',
        'img' => 'required|string|max:255|min:3',
        'number' => 'required|string|max:255|min:3',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allnumbers = numbers::latest()->paginate(10);

        return view('admin.setting.number.index', ['allnumbers' => $allnumbers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.number.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate($this->rule, $this->messages());

        numbers::create($data);

        return redirect('/admin/Number')->with('OkToast', 'تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $number = numbers::find($id);

        return view('admin.setting.number.edit', ['number' => $number]);
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate($this->rule, $this->messages());
        $number = numbers::find($id);

        $number->title = $request->title;
        $number->img = $request->img;
        $number->number = $request->number;

        $number->save();

        return redirect()->route('admin.Number.index')->with('OkToast', 'تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $number = numbers::find($id);
        $number->delete();

        return redirect('/admin/Number')->with('OkToast', 'تم حذف العنصر');
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'يجب كتابة العنوان ',
            'title.string' => 'يجب ان يكون العنوان نص فقط',
            'title.max' => 'يجب ان لا يزيد عنوان النص عن 25 حرف',
            'title.min' => 'يجب ان لا يقل عنوان النص عن 3 حرف',

            'img.required' => 'يجب كتابة الوصف ',
            'img.string' => 'يجب ان يكون الوصف نص فقط',
            'img.max' => 'يجب ان لا يزيد الوصف  عن 255 حرف',
            'img.min' => 'يجب ان لا يقل عنوان النص عن 3 حرف',

            'number.required' => 'يجب إضافة  ايقونة ',
            'number.string' => 'يجب ان يكون الايقونة نص فقط',
            'number.max' => 'يجب ان لا يزيد  الايقونة عن 255 حرف',
            'number.min' => 'يجب ان لا يقل الايقونة النص عن 3 حرف',

        ];
    }
}
