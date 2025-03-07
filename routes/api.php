<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
Route::post('/tasks/search', [TaskController::class, 'search']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
