<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="container">
    <h1>Edit Task</h1>

    <!-- Error Handling -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Task Edit Form -->
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Task Title</label>
            <input type="text" name="title" class="form-control" maxlength="100" value="{{ old('title', $task->title) }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" maxlength="255">{{ old('description', $task->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
@endsection
