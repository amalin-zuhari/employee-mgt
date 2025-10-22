@extends('layouts.app')

@section('content')
<h2>Add Department</h2>

{{-- Show validation errors if any --}}
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

<form action="{{ route('departments.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Department ID:</label>
        <input type="text" name="department_id" 
        class="form-control" 
        value="{{ old('department_id') }}" required>
        @error('department_id')
            <div style="color: rgb(235, 155, 6); font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label>Department Name:</label>
        <input type="text" name="name" 
        class="form-control" 
        value="{{ old('name') }}" required>
        @error('name')
            <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div><br>
    <button type="submit">Save</button>
</form>

<br>
<a href="{{ route('departments.index') }}">← Back to Department List</a>
@endsection
