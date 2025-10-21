@extends('layouts.app')

@section('content')
<h2>Department List</h2>

<a href="{{ route('departments.create') }}">Add Department</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach ($departments as $dept)
    <tr>
        <td>{{ $dept->department_id }}</td>
        <td>{{ $dept->name }}</td>
        <td>
            <a href="{{ route('departments.edit', $dept->department_id) }}">Edit</a>
            <form action="{{ route('departments.destroy', $dept->department_id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this department?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
