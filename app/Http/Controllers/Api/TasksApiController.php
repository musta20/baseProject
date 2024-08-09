<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\updateTaskRequest;
use App\Models\Files;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksApiController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        $filterBox = Tasks::showFilter(
            realData: $users,
            relType: 'user',
            relName: 'المستخدمين',
        );

        $allTasks = Tasks::Filter()->latest()->with('user')->RequestPaginate();

        return response()->json(['tasks' => $allTasks, 'filter' => $filterBox]);
    }

    public function store(StoreTaskRequest $request)
    {
        $user = User::findOrFail($request->user_id);

        $task = Tasks::create([
            'title' => $request->title,
            'des' => $request->des,
            'user_id' => $user->id, // Use the retrieved user's ID
            'start' => $request->start,
            'end' => $request->end,
            'isdone' => 0,
            'isread' => 0,
            'boss_id' => Auth::user()->id,
        ]);

        $this->storeTaskAttachments($request, $task);

        return response()->json(['message' => 'Task created successfully.', 'task' => $task], 201);
    }

    public function show(Tasks $task)
    {
        return response()->json(['task' => $task->load('files')]);
    }

    public function update(updateTaskRequest $request, Tasks $task)
    {
        $task->update($request->validated());

        Files::where('typeid', $task->id)->where('type', 0)->delete();
        $this->storeTaskAttachments($request, $task);

        return response()->json(['message' => 'Task updated successfully.', 'task' => $task]);
    }

    public function destroy(Tasks $task)
    {
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully.']);
    }

    // ... other methods (mainTask, showTask, editTask, etc.)

    private function storeTaskAttachments(Request $request, Tasks $task)
    {
        $i = 0;
        while ($request->hasFile('attachment-' . $i)) {
            $filenameName = time() . rand(1, 10000) . '-' . $request->file('attachment-' . $i)->getClientOriginalName();

            $request->validate([
                'attachment-' . $i => 'required|file|mimes:doc,pdf,jpg,jpeg,png|max:2048',
            ]);

            $request->file('attachment-' . $i)->storeAs('task', $filenameName);

            Files::create([
                'name' => $filenameName,
                'typeid' => $task->id,
                'type' => 0,
            ]);

            $i++;
        }
    }

    // ... rest of your controller methods (mainTask, showTask, editTask, etc.)
}
