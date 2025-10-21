@extends('layouts.app')

@section('content')
<h2>Edit Department</h2>

{{-- Show validation errors if any --}}
@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{-- Edit form --}}
<form action="{{ route('departments.update', $department->department_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Department ID:</label>
        <input type="text" name="department_id" value="{{ old('department_id', $department->department_id) }}" required>
    </div>
    <br>
    <div>

        <label>Department Name:</label>
        <input type="text" name="name" value="{{ old('name', $department->name) }}" required>
    </div>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('departments.index') }}">← Back to Department List</a>
@endsection
