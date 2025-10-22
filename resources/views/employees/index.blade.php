@extends('layouts.app')

@section('content')
<h2>Employee List</h2>

{{-- Show success message if any --}}
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a class="btn btn-success" href="{{ route('employees.create') }}">+ Add Employee</a>

<table class="table table-striped table-dark">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>IC No</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Department</th>
        <th>Actions</th>
    </tr>

    {{-- Loop through employee data --}}
    @foreach ($employees as $emp)
    <tr>
        <td>{{ $emp->id }}</td>
        <td>{{ $emp->name }}</td>
        <td>{{ $emp->ic_no }}</td>
        <td>{{ $emp->email }}</td>
        <td>{{ $emp->phone_no }}</td>
        <td>{{ $emp->department ? $emp->department->name : '-' }}</td>

        <td>
            <a class="btn btn-primary" href="{{ route('employees.show', $emp->id) }}">View</a>
            <a class="btn btn-warning" href="{{ route('employees.edit', $emp->id) }}">Edit</a>

            {{-- Delete form --}}
            <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete this employee?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
