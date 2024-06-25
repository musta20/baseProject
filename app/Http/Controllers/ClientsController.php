<?php

namespace App\Http\Controllers;

use App\Enums\CommentStatus;
use App\Http\Requests\updateClientRequest;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show the filter box for clients
        $filterBox = clients::showFilter();

        // Get the filtered clients and paginate the results
        $client = clients::Filter()->latest()->RequestPaginate();

        // Render the view for the index of clients
        return view('admin.client.index',
            [
                'client' => $client,  // The paginated list of clients
                'filterBox' => $filterBox, // The filter box for clients
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(clients $Client)
    {
        $statusoption = CommentStatus::cases();

        return view('admin.client.edit', ['statusoption' => $statusoption, 'client' => $Client]);

    }

    /**
     * Update the specified client resource in storage.
     *
     * @param  updateClientRequest  $request  The request object containing the updated status
     * @param  clients  $Client  The client object to be updated
     * @return \Illuminate\Http\Response Redirects to the index page with a success message
     */
    public function update(updateClientRequest $request, clients $Client)
    {
        // Update the status of the client with the new status from the request
        $Client->status = $request->status;

        // Save the updated client object to the database
        $Client->save();

        // Redirect to the index page and display a success message
        return redirect()
            ->route('admin.Clients.index')
            ->with('OkToast', 'تم تعديل العنصر');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(clients $Client)
    {
        $Client->delete();

        return redirect()->route('admin.Clients.index')->with('OkToast', 'تم حذف العنصر');
    }
}
