<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ToDoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::get('todos', [ToDoController::class, 'index']);
    Route::post('todos', [ToDoController::class, 'store']);
    Route::put('todos',[ToDoController::class,'toDone']);
    Route::get('todos/uncompleted',[ToDoController::class,'getUncompletedItems']);
});
