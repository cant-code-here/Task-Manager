<!-- resources/views/tasks/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create New Task')

@section('content')
<div class="container">
    <h1>Create a New Task</h1>

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

    <!-- Task Creation Form -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Task Title</label>
            <input type="text" name="title" class="form-control" maxlength="100" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" maxlength="255">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>
@endsection
