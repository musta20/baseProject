<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //AllLogs
        $filterBox = Activity::showFilter();
        $AllLogs = Activity::Filter()->RequestPaginate();
        $users = User::get();

        return view('admin.Logs.index', ['AllLogs' => $AllLogs, 'filterBox' => $filterBox, 'users' => $users]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $Log)
    {
        return view('admin.Logs.show', ['log' => $Log]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logsList($id)
    {
        //AllLogs logsList
        $filterBox = Activity::showFilter();

        $AllLogs = Activity::Filter()->where('causer_id', $id)->RequestPaginate();
        $users = User::get();
        $user = User::find($id);

        return view('admin.Logs.list', ['AllLogs' => $AllLogs, 'filterBox' => $filterBox, 'users' => $users, 'user' => $user]);
    }
}
