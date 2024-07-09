<?php

namespace App\Actions;

use App\Models\Task;

class TaskSearchAction
{
    public function __invoke($request)
    {
        $request->validate([
            'status' => 'required|string|max:1',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $tasks = Task::whereBetween('end_date', [$startDate, $endDate])->where('status', $request->status)->get();

        return $tasks;
    }
}
