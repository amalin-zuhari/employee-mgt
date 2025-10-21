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

    <label>Department Name:</label><br>
    <input type="text" name="name" value="{{ old('name', $department->name) }}" required><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('departments.index') }}">← Back to Department List</a>
@endsection
