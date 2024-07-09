<?php

namespace App\Actions;

use App\Models\Task;

class TaskDestroyAction
{
    public function __invoke($id)
    {
        $task = Task::find($id);
        if($task == null){
            return 0;
            exit;
        }

        $task->delete();
    }
}
