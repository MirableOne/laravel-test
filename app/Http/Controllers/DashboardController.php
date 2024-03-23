<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(TaskRepository $taskRepository, Request $request)
    {
        /** @var $user User */
        $user = $request->user();

        return view('dashboard', [
            'tasks' => $taskRepository->getActiveTasksForUser($user)
        ]);
    }
}
