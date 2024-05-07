<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    public function index() {
        return Task::all();
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable|max:255',
        ]);
        $task = Task::create($validatedData);
        return response()->json($task, 201); 
    }

    public function show($id) {
        $task = Task::findOrFail($id); 
        return response()->json($task);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable|max:255',
        ]);
        $task = Task::findOrFail($id);
        $task->update($validatedData);
        return response()->json($task);
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }

}
