@extends('layouts.app')

@section('content')
<h2>Edit Employee</h2>

{{-- Display validation errors --}}
@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name', $employee->name) }}" required><br><br>

    <label>IC No:</label><br>
    <input type="text" name="ic_no" value="{{ old('ic_no', $employee->ic_no) }}" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email', $employee->email) }}" required><br><br>

    <label>Phone No:</label><br>
    <input type="text" name="phone_no" value="{{ old('phone_no', $employee->phone_no) }}" required><br><br>

    <label>Department:</label><br>
    <select name="dept_id" required>
        @foreach ($departments as $dept)
            <option value="{{ $dept->department_id }}"
                {{ $dept->department_id == $employee->dept_id ? 'selected' : '' }}>
                {{ $dept->name }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Update</button>
</form>
@endsection
