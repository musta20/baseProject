<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveMessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Implement if needed
        return response()->json(['message' => 'Index method not implemented'], 501);
    }

    /**
     * Get users for message creation.
     *
     * @return JsonResponse
     */
    public function getUsers(): JsonResponse
    {
        $users = User::get();
        return response()->json(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveMessageRequest $request
     * @return JsonResponse
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
     *
     * @param Message $message
     * @return JsonResponse
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
     *
     * @param Message $message
     * @return JsonResponse
     */
    public function destroy(Message $message): JsonResponse
    {
        $message->delete();
        return response()->json(['message' => 'Message deleted successfully']);
    }

    /**
     * Display inbox messages.
     *
     * @param int $type
     * @return JsonResponse
     */
    public function inbox(int $type): JsonResponse
    {
        $users = User::all();

        if ($type == 1) {
            $filterBox = Message::showFilter(realData: $users, relType: 'ToUser', relName: 'المستلمين');
            $messages = Message::Filter()->where('from', Auth::id())->with('toUser')->latest()->RequestPaginate();
        } elseif ($type == 2) {
            $filterBox = Message::showFilter(realData: $users, relType: 'FromUser', relName: 'مرسل من');
            Message::where('to', Auth::id())->update(['isred' => 1]);
            $messages = Message::Filter()->where('to', Auth::id())->with('fromUser')->latest()->RequestPaginate();
        } else {
            return response()->json(['error' => 'Invalid inbox type'], 400);
        }

        return response()->json([
            'filterBox' => $filterBox,
            'messages' => $messages,
            'type' => $type,
        ]);
    }

    /**
     * Get main dashboard data.
     *
     * @return JsonResponse
     */
    public function main(): JsonResponse
    {
        // Implement if needed, return relevant data for dashboard
        return response()->json(['message' => 'Main dashboard data']);
    }
}