<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoUpdateRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function markAsDone(Todo $todo)
    {
        $todo->is_done = true;
        $todo->save();

        return new TodoResource($todo);
    }

    public function markAsUndone(Todo $todo)
    {
        $todo->is_done = false;
        $todo->save();

        return new TodoResource($todo);
    }

    public function update(Todo $todo, TodoUpdateRequest $request)
    {
        $input = $request->validated();
        $todo->fill($input);
        $todo->save();
        return new TodoResource($todo);
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
    }
}
