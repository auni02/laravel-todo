@extends('layouts.app')

@section('title', 'Todo List')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Todo List</h1>
        <a href="{{ route('todos.create') }}" class="btn btn-primary">Add Todo</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($todos->count() > 0)
                @foreach($todos as $todo)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $todo->title }}</td>
                        <td class="align-middle">{{ $todo->description }}</td>
                        <td class="align-middle">
                            @if($todo->status == 'completed')
                                <span class="badge bg-success">Completed</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td class="align-middle">{{ $todo->due_date }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Actions">
                                <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('todos.edit', $todo->id)}}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">No todo found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
