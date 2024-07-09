<?php

namespace App\Actions;

use App\Models\Task;

class TaskUpdateAction
{
    public function __invoke($id, $request)
    {
        $task = Task::find($id);

        if($task == null){
            return response()->json([
                'message' => 'There is no such task'
            ]); 
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:1',
            'end_date' => 'required|date',
        ]);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'end_date' => $request->end_date,
        ]);

        return $task;
    }
}
