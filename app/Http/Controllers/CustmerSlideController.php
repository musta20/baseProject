<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCustmerSlideRequest;
use App\Http\Requests\updateCustmerSlideRequest;
use App\Models\CustmerSlide;

class CustmerSlideController extends Controller
{


    /**
     * Display a paginated listing of the Custmer Slide resources.
     *
     * This function retrieves the latest Custmer Slide resources
     * and renders the 'admin.setting.CustmerSlide.index' view,
     * passing the retrieved resources as data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the latest Custmer Slide resources with pagination
        $CustmerSlide = CustmerSlide::latest()->paginate(10);

        // Render the 'admin.setting.CustmerSlide.index' view
        // and pass the retrieved resources as data
        return view(
            "admin.setting.CustmerSlide.index",
            ['CustmerSlide' => $CustmerSlide]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.setting.CustmerSlide.add" );

    }

    /**
     * Store a newly created Custmer Slide in storage.
     *
     * @param  storeCustmerSlideRequest  $request The request containing the Custmer Slide data
     * @return \Illuminate\Http\Response Redirects to '/admin/CustmerSlide' with a success message
     */
    public function store(storeCustmerSlideRequest $request)
    {
        // Retrieve the uploaded image and store it in the 'Slide' directory of the 'public' disk
        $data['img'] =  $request->file('img')->store('Slide','public');

        // Create a new Custmer Slide resource with the retrieved data
        CustmerSlide::create($data);

        // Redirect to the '/admin/CustmerSlide' route with a success message
        return redirect('/admin/CustmerSlide')->with('OkToast','تم إضافة البيانات');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustmerSlide  $custmerSlide
     * @return \Illuminate\Http\Response
     */
    public function show(CustmerSlide $slide)
    {
        return view("admin.setting.CustmerSlide.edit",  ['slide' => $slide] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustmerSlide  $custmerSlide
     * @return \Illuminate\Http\Response
     */
    public function edit(CustmerSlide $custmerSlide)
    {
        //
    }

    /**
     * Update the specified CustmerSlide resource in storage.
     *
     * @param  updateCustmerSlideRequest  $request The request containing the Custmer Slide data
     * @param  CustmerSlide  $slide The Custmer Slide to be updated
     * @return \Illuminate\Http\Response Redirects to '/admin/CustmerSlide' with a success message
     */
    public function update(updateCustmerSlideRequest $request, CustmerSlide $slide)
    {
        // Retrieve the uploaded image from the request and update the Custmer Slide in a single query
        $slide->update([
            'img' => $request->file('img')->store('Slide', 'public'),
            'url' => $request->url,
        ]);

        // Redirect to the Custmer Slide index page with a success message
        return redirect()
            ->route('admin.CustmerSlide.index')
            ->with('OkToast', 'تم تعديل العنصر');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustmerSlide  $custmerSlide
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustmerSlide $slide)
    {
        // Use the delete method directly on the model to avoid any additional queries
        return $slide->delete() ? 
            redirect()->route('admin.CustmerSlide.index')->with('OkToast','تم حذف العنصر') : 
            redirect()->route('admin.CustmerSlide.index')->with('ErrorToast','حدث خطأ أثناء حذف العنصر');

    }
}
