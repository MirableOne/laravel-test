<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController
{
    public function create()
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $data = $request->safe()->only(['title', 'description']);

        /** @var $user User */
        $user = $request->user();

        $task = new Task();
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->deleted = false;
        $task->done = false;
        $task->user_id = $user->id;
        $task->save();

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request, TaskRepository $taskRepository)
    {
        $taskId = $request->input('task-id');

        if ($taskId) {
            $taskRepository->destroy((int)$taskId);
        }

        return redirect()->route('dashboard');
    }

    public function markAsDone(Request $request, TaskRepository $taskRepository)
    {
        $taskId = $request->input('task-id');

        if ($taskId) {
            $taskRepository->markAsDone((int)$taskId);
        }

        return redirect()->route('dashboard');
    }
}
