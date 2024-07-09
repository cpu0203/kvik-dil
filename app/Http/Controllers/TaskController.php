<?php

namespace App\Http\Controllers;

use App\Actions\TaskDestroyAction;
use App\Actions\TaskSearchAction;
use App\Actions\TaskStoreAction;
use App\Actions\TaskUpdateAction;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TaskStoreAction $taskStoreAction)
    {
        return response()->json([
            'message' => 'Task was created successfully',
            'data' => new TaskResource($taskStoreAction($request))
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::find($id);

        if($task == null){
            return response()->json([
                'message' => 'There is no such task'
            ]); 
        }

        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, TaskUpdateAction $taskUpdateAction)
    {
        $task = $taskUpdateAction($id, $request);

        if($task == null){
            return response()->json([
                'message' => 'There is no such task'
            ]); 
        }

        return response()->json([
            'message' => 'Task was updated successfully',
            'data' => new TaskResource($task)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, TaskDestroyAction $taskDestroyAction)
    {
        // $ans = $taskDestroyAction($id);

        if($taskDestroyAction($id) === 0){
            return response()->json([
                'message' => 'There is no such task'
            ], 200);
        }

        return response()->json([
            'message' => 'Task (id '.$id.') was deleted successfully'
        ], 200); 
    }


    public function search(Request $request, TaskSearchAction $taskSearchAction)
    {

        if($request->status !== null && $request->startDate !== null && $request->endDate !== null){
            $tasks = $taskSearchAction($request);

            if($tasks == null){
                return response()->json([
                    'message' => 'There is no such tasks'
                ], 200); 
            }

            return TaskResource::collection($tasks);
        }
    }
}
