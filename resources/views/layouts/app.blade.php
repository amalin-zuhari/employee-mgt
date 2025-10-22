<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
    crossorigin="anonymous">
    <title>Employee Management System</title>
</head>
<body>
    <div class="text-center">
        <h1>Employee Management System</h1>

        {{-- Simple navigation links --}}
        <nav>
            <a href="{{ route('departments.index') }}">Departments</a> |
            <a href="{{ route('employees.index') }}">Employees</a>
        </nav>

        <hr>
    </div>

    {{-- <h1>Employee Management System</h1> --}}

    {{-- Simple navigation links --}}
    {{-- <nav>
        <a href="{{ route('departments.index') }}">Departments</a> |
        <a href="{{ route('employees.index') }}">Employees</a>
    </nav>

    <hr> --}}

    {{-- Show page content here --}}

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
