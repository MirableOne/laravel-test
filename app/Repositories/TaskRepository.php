<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    public function getActiveTasksForUser(User $user): Collection
    {
        return (new Task())
            ->where('user_id', $user->id)
            ->where('deleted', false)
            ->get();
    }

    public function markAsDone(int $id): void
    {
        $model = (new Task())->findOrFail($id);
        $model->done = true;
        $model->save();
    }

    public function destroy(int $id): void
    {
        $model = (new Task())->findOrFail($id);
        $model->deleted = true;
        $model->save();
    }
}
