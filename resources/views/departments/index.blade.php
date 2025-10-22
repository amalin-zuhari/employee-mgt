@extends('layouts.app')

@section('content')
<h2>Department List</h2>

<a class="btn btn-success" href="{{ route('departments.create') }}"><i class="bi bi-plus-square-fill"></i> Add Department</a>
<br>
<br>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table class="table table-striped">
    <tr class="table-primary">
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach ($departments as $dept)
    <tr>
        <td>{{ $dept->department_id }}</td>
        <td>{{ $dept->name }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('departments.edit', $dept->department_id) }}"><i class="bi bi-airplane-engines-fill"></i> Kemaskini</a>
            <form action="{{ route('departments.destroy', $dept->department_id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this department?')"  class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title=" Hapus"><i class="bi bi-x-circle-fill"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
