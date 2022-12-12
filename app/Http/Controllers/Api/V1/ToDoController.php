<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ToDoStoreRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;

class ToDoController extends Controller
{
    public function index() : JsonResponse
    {
        $todos = Todo::paginate(10);

        return response()->json($todos,200);
    }

    public function store(ToDoStoreRequest $request) : JsonResponse
    {
        $todo = Todo::create($request->validated());

        return response()->json($todo,201);
    }

    public function toDone(Request $request) : JsonResponse
    {
        $todo = Todo::findOrFail($request->id);
        $todo->is_done = true;
        $todo->save();

        return response()->json($todo,200);
    }

    public function getUncompletedItems() : JsonResponse
    {
        $todos = Todo::where('is_done',false)->paginate(10);

        return response()->json($todos,200);
    }
}
