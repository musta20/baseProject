<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveMessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class MessageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        // Implement if needed
        return response()->json(['message' => 'Index method not implemented'], 501);
    }

    /**
     * Get users for message creation.
     */
    public function getUsers(): JsonResponse
    {
        $users = User::get();

        return response()->json(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveMessageRequest $request): JsonResponse
    {
        $message = Message::create([
            'title' => $request['title'],
            'message' => $request['message'],
            'from' => Auth::id(),
            'to' => $request['to'],
            'isred' => 0,
        ]);

        return response()->json(['message' => 'Message sent successfully', 'data' => $message], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message): JsonResponse
    {
        if ($message->from != Auth::id() && $message->to != Auth::id()) {
            return response()->json(['error' => 'Unauthorized access to this message'], 403);
        }

        return response()->json(['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message): JsonResponse
    {
        $message->delete();

        return response()->json(['message' => 'Message deleted successfully']);
    }

    /**
     * Display inbox messages.
     */
    public function inbox(int $type): JsonResponse
    {
        $users = User::all();

        if ($type == 1) {
           // $filterBox = Message::showFilter(realData: $users, relType: 'ToUser', relName: 'المستلمين');
            $messages = Message::Filter()->where('from', Auth::id())->with('toUser')->latest()->RequestPaginate();
        } elseif ($type == 2) {
          //  $filterBox = Message::showFilter(realData: $users, relType: 'FromUser', relName: 'مرسل من');
            Message::where('to', Auth::id())->update(['isred' => 1]);
            $messages = Message::Filter()->where('to', Auth::id())->with('fromUser')->latest()->RequestPaginate();
        } else {
            return response()->json(['error' => 'Invalid inbox type'], 400);
        }

        return response()->json([
           // 'filterBox' => $filterBox,
            'messages' => $messages,
            'type' => $type,
        ]);
    }

    /**
     * Get main dashboard data.
     */
    public function main(): JsonResponse
    {
        // Implement if needed, return relevant data for dashboard
        return response()->json(['message' => 'Main dashboard data']);
    }
}
