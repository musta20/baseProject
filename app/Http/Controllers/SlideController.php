<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public $rule = [
        'title' => 'required|string|max:255|min:3',

        'img' => 'max:2048|mimes:jpg,jpeg,png',
        'des' => 'required|string|max:255|min:3',
        'url' => 'required|string|max:255|min:3',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allslide = slide::latest()->paginate(10);

        // dd( $allcategory);
        //Services
        return view('admin.setting.slide.index', ['allslide' => $allslide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.setting.slide.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rule, $this->messages());

        $imagename = $request->file('img')->store('Slide');

        slide::create(
            [
                'title' => $request['title'],
                'des' => $request['des'],
                'url' => $request['url'],
                'img' => $imagename,
            ]
        );

        return redirect('/admin/Slide')->with('OkToast', 'تم إضافة البيانات');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = slide::find($id);

        return view('admin.setting.slide.edit', ['slide' => $slide]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(slide $Slide)
    {
        return view('admin.setting.slide.edit', ['slide' => $Slide]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate($this->rule, $this->messages());

        $slide = slide::find($id);

        $slide->title = $request->title;

        $slide->des = $request->des;

        if ($request->hasFile('img')) {

            $slide->img = $request->file('img')->store('Slide');

        }

        $slide->url = $request->url;

        $slide->save();

        return redirect()->route('admin.Slide.index')->with('OkToast', 'تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = slide::find($id);
        $slide->delete();

        return redirect('/admin/Slide/')->with('OkToast', 'تم حذف العنصر');
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

            'url.required' => 'يجب كتابة الرابط ',
            'url.string' => 'يجب ان يكون الرابط نص فقط',
            'url.max' => 'يجب ان لا يزيد عنوان الرابط  25 حرف',
            'url.min' => 'يجب ان لا يقل عنوان الرابط  3 حرف',

            'img.required' => 'يجب كتابة الصورة ',
            'img.string' => 'يجب ان يكون الصورة نص فقط',
            'img.max' => 'يجب ان لا يزيد الصورة النص عن 25 حرف',
            'img.min' => 'يجب ان لا يقل الصورة النص عن 3 حرف',

            'des.required' => 'يجب كتابة الوصف ',
            'des.string' => 'يجب ان يكون الوصف نص فقط',
            'des.max' => 'يجب ان لا يزيد الوصف النص عن 25 حرف',
            'des.min' => 'يجب ان لا يقل الوصف النص عن 3 حرف',

        ];
    }
}
