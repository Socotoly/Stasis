<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;

class TaskCompleteController extends Controller
{

    public function store(Task $task)
    {
        return $task->markCompleted();
    }

    public function destroy(Task $task)
    {
        return $task->markUncompleted();
    }
}
