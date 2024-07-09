<?php

namespace App\Actions;

use App\Models\Task;

class TaskStoreAction
{
    /**
     * Create a new class instance.
     */
    public function __invoke($request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'end_date' => 'required|date',
        ]);
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'end_date' => $request->end_date,
            'status' => '0'
        ]);
        return $task;
    }
}
