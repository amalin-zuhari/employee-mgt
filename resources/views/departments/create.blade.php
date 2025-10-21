@extends('layouts.app')

@section('content')
<h2>Add Department</h2>

<form action="{{ route('departments.store') }}" method="POST">
    @csrf

    <div>
        <label>Department ID:</label>
        <input type="text" name="department_id" required>
    </div>
    <br>
    <div>
        <label>Department Name:</label>
        <input type="text" name="name" required>
    </div><br>
    <button type="submit">Save</button>
</form>
@endsection
