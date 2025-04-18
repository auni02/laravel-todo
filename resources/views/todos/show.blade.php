@extends('layouts.app')

@section('title', 'Show Todo')

@section('contents')
    <h1 class="mb-0">Detail Todo</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $todo->title }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $todo->description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" placeholder="Status" value="{{ $todo->status }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Due Date</label>
            <input type="text" name="due_date" class="form-control" placeholder="Due Date" value="{{ $todo->due_date }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $todo->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $todo->updated_at }}" readonly>
        </div>
    </div>
@endsection
