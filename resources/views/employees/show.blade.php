@extends('layouts.app')

@section('content')
<h2>Employee Details</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Name</th>
        <td>{{ $employee->name }}</td>
    </tr>
    <tr>
        <th>IC No</th>
        <td>{{ $employee->ic_no }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $employee->email }}</td>
    </tr>
    <tr>
        <th>Phone No</th>
        <td>{{ $employee->phone_no }}</td>
    </tr>
    <tr>
        <th>Department</th>
        <td>{{ $employee->department ? $employee->department->name : '-' }}</td>
    </tr>
</table>

<br>
<a href="{{ route('employees.index') }}">← Back to list</a>
@endsection
