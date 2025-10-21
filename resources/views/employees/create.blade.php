@extends('layouts.app')

@section('content')
<h2>Add New Employee</h2>

{{-- Show validation errors --}}
@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('employees.store') }}" method="POST">
    @csrf

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}" required><br><br>

    <label>IC No:</label><br>
    <input type="text" name="ic_no" value="{{ old('ic_no') }}" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email') }}" required><br><br>

    <label>Phone No:</label><br>
    <input type="text" name="phone_no" value="{{ old('phone_no') }}" required><br><br>

    <label>Department:</label><br>
    <select name="dept_id" required>
        <option value="">-- Select Department --</option>
        @foreach ($departments as $dept)
            <option value="{{ $dept->department_id }}">{{ $dept->name }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Save</button>
</form>
@endsection
