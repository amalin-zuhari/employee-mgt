<!DOCTYPE html>
<html>
<head>
    <title>Employee Management System</title>
</head>
<body>

    <h1>Employee Management System</h1>

    {{-- Simple navigation links --}}
    <nav>
        <a href="{{ route('departments.index') }}">Departments</a> |
        <a href="{{ route('employees.index') }}">Employees</a>
    </nav>

    <hr>

    {{-- Show page content here --}}
    <div>
        @yield('content')
    </div>

</body>
</html>
