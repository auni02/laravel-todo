@extends('layouts.app')

@section('title', 'Edit Todo')

@section('contents')
    <h1 class="mb-0">Edit Todo</h1>
    <hr />
    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $todo->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" placeholder="Description" rows="3" required>{{ $todo->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ $todo->due_date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $todo->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $todo->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>
    </form>
@endsection
