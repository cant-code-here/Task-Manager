<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
{
    $sortOrder = $request->query('sort_order', 'asc');
    $filterTitle = $request->query('filter_title', ''); // Default to empty
    $filterDescription = $request->query('filter_description', ''); // Default to empty

    // Retrieve tasks with sorting and filtering
    $query = Task::orderBy('created_at', $sortOrder);

    if ($filterTitle) {
        $query->where('title', 'like', "%$filterTitle%");
    }

    if ($filterDescription) {
        $query->where('description', 'like', "%$filterDescription%");
    }

    $tasks = $query->get();

    return view('tasks.index', [
        'tasks' => $tasks,
        'sort_order' => $sortOrder,
        'filter_title' => $filterTitle,
        'filter_description' => $filterDescription,
    ]);
}


   // Show the form for creating a new task
   public function create()
   {
       return view('tasks.create');
   }

   public function store(Request $request)
   {
        // Validate form data
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable|max:255', // Description can be empty, but has a maximum length
        ]);

        // Create the task with validated data
        Task::create($validatedData);

        // Redirect back to the tasks list
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
   }

   // Show the form for editing a task
   public function edit($id)
   {
       $task = Task::find($id);
       return view('tasks.edit', ['task' => $task]);
   }
   
   public function update(Request $request, $id)
   {
        // Validate form data
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable|max:255',
        ]);

        // Update the task with validated data
        $task = Task::find($id);
        $task->update($validatedData);

        // Redirect back to the tasks list
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
   }


   // Delete a task
   public function destroy($id)
   {
       $task = Task::find($id);
       $task->delete();

       return redirect()->route('tasks.index');
   }
}
