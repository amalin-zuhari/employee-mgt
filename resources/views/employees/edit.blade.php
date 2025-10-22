@extends('layouts.app')

@section('content')
<h2>Edit Employee</h2>

{{-- Display validation errors --}}
@if ($errors->any())
    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 20px;">
        <strong>Please fix the following errors:</strong>
        <ul style="margin: 5px 0 0 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ old('name', $employee->name) }}" required>
    @error('name')
        <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
    @enderror
    <br><br>

    <label>IC No:</label><br>
    <input type="text" name="ic_no" value="{{ old('ic_no', $employee->ic_no) }}" required>
    @error('ic_no')
        <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email', $employee->email) }}" required>
    @error('email')
        <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Phone No:</label><br>
    <input type="text" name="phone_no" value="{{ old('phone_no', $employee->phone_no) }}" required>
    @error('phone_no')
        <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Department:</label><br>
    <select name="dept_id" required>
        @foreach ($departments as $dept)
            <option value="{{ $dept->department_id }}"
                {{ (old('dept_id', $employee->dept_id) == $dept->department_id) ? 'selected' : '' }}>
                {{ $dept->name }}
            </option>
        @endforeach
    </select>
    @error('dept_id')
        <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
    @enderror
    <br><br>

    <button type="submit">Update</button>
</form>
@endsection
