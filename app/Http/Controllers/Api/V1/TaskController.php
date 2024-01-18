<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskSaveRequest;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(TaskSaveRequest $request) {
        $data = $request->validated();
        $task = Task::create($data);

        return new TaskResource($task);
    }

    public function edit(TaskSaveRequest $request, Task $task) {
        $data = $request->validated();
        $task->update($data);

        return new TaskResource($task);
    }

    public function destroy(Task $task) {
        $task->delete();

        return response()->json(['status' => 1]);
    }

    public function index($id) {
        return TaskResource::collection(Task::all());
    }
}
