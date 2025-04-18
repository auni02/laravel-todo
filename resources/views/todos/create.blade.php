@extends('layouts.app')

@section('title', 'Create Todo')

@section('contents')
    <h1 class="mb-0">Add Todo</h1>
    <hr />
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="title" class="form-control" placeholder="Title" required>
        </div>

        <div class="mb-3">
            <textarea name="description" class="form-control" placeholder="Description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <input type="date" name="due_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <select name="status" class="form-control" required>
                <option value="">-- Select Status --</option>
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
