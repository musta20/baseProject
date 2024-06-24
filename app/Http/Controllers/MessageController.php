<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveMessageRequest;
use App\Models\message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();

        return view('admin.messages.add', ['Users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveMessageRequest $request)
    {
        message::create([
            'title' => $request['title'],
            'message' => $request['message'],
            'from' => Auth::user()->id,
            'to' => $request['to'],
            'isred' => 0,

        ]);

        return redirect()->route('admin.inbox', 1)->with('OkToast', 'تم إرسال الرسالة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(message $Message)
    {

        if ($Message->from != Auth::user()->id and $Message->to != Auth::user()->id) {
            return redirect()->route('admin.inbox', 1)->with('OkToast', 'حدث خطء ');
        }

        return view('admin.messages.show', ['message' => $Message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $Message)
    {
        $Message->delete();

        return redirect()->route('admin.inbox', 1)->with('OkToast', ' تم حذف الرسالة ');
    }

    public function inbox($type)
    {

        $users = User::all();

        if ($type == 1) {

            $filterBox = message::ShowFilter(realData: $users, relType: 'ToUser', relName: 'المستلمين');

            $Messages = message::Filter()->where('from', Auth::user()->id)->with('toUser')->latest()->RequestPaginate();

        } elseif ($type == 2) {

            $filterBox = message::ShowFilter(realData: $users, relType: 'FromUser', relName: 'مرسل من');

            message::where('to', Auth::user()->id)->update(['isred' => 1]);

            $Messages = message::Filter()->where('to', Auth::user()->id)->with('fromUser')->latest()->RequestPaginate();
        }

        return view('admin.messages.index', [
            'filterBox' => $filterBox,
            'Messages' => $Messages,
            'type' => $type,
        ]);
    }

    public function main()
    {
        return view('admin.messages.main');
    }
}
