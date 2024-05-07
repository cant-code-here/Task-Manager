<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
<div class="container">
    <h1 class="mb-4">Task List</h1>

    <!-- Sorting and Filtering -->
    <div class="mb-3">
        <form method="GET" action="{{ route('tasks.index') }}" class="form-inline">
            <!-- Sorting -->
            <label for="sort_order">Sort by:</label>
            <select name="sort_order" class="form-control ml-2" onchange="this.form.submit()">
                <option value="asc" {{ $sort_order == 'asc' ? 'selected' : '' }}>Date (Oldest First)</option>
                <option value="desc" {{ $sort_order == 'desc' ? 'selected' : '' }}>Date (Newest First)</option>
            </select>

            <!-- Filtering by Title -->
            <label for="filter_title" class="ml-3">Search by Title:</label>
            <input type="text" name="filter_title" class="form-control ml-2" value="{{ $filter_title }}" onchange="this.form.submit()">

            <!-- Filtering by Description -->
            <label for="filter_description" class="ml-3">Search by Description:</label>
            <input type="text" name="filter_description" class="form-control ml-2" value="{{ $filter_description }}" onchange="this.form.submit()">
        </form>
    </div>

    <!-- Task Table -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($task->description, 50) }}</td>
                        <td>{{ $task->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
