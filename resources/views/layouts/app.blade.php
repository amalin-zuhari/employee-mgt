<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
    crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-link {
            font-weight: 500;
            color: #495057 !important;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 5px;
        }
        
        .nav-link:hover {
            color: #667eea !important;
            background-color: rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }
        
        .nav-link.active {
            color: #667eea !important;
            background-color: rgba(102, 126, 234, 0.15);
            font-weight: 600;
        }
        
        .content-wrapper {
            flex: 1;
            padding: 2rem 0;
        }
        
        .footer {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
        }
        
        .footer p {
            margin: 0;
            opacity: 0.8;
        }
        
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 1rem 0;
            }
            
            .navbar-brand {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        {{-- Modern Navigation Bar --}}
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('departments.index') }}">
                    <i class="bi bi-building me-2"></i>
                    Employee Management System
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}" 
                               href="{{ route('departments.index') }}">
                                <i class="bi bi-building me-1"></i>Departments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" 
                               href="{{ route('employees.index') }}">
                                <i class="bi bi-people me-1"></i>Employees
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Main Content Area --}}
        <div class="content-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        {{-- Footer --}}
        <footer class="footer">
            <div class="container">
                <p>&copy; {{ date('Y') }} Employee Management System. Built with Laravel & Bootstrap.</p>
            </div>
        </footer>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"></script>
</body>
</html>
