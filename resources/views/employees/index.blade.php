@extends('layouts.app')

@section('content')
<div class="container-fluid px-3">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-people me-2 fs-4"></i>
                            <h4 class="mb-0">Employee Management</h4>
                        </div>
                        <a href="{{ route('employees.create') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-person-plus me-2"></i>Add New Employee
                        </a>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($employees->count() > 0)
                        <div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0">
                                            <i class="bi bi-hash me-1 text-success"></i>ID
                                        </th>
                                        <th class="border-0">
                                            <i class="bi bi-person me-1 text-success"></i>Name
                                        </th>
                                        <th class="border-0">
                                            <i class="bi bi-card-text me-1 text-success"></i>IC No
                                        </th>
                                        <th class="border-0">
                                            <i class="bi bi-envelope me-1 text-success"></i>Email
                                        </th>
                                        <th class="border-0">
                                            <i class="bi bi-telephone me-1 text-success"></i>Phone
                                        </th>
                                        <th class="border-0">
                                            <i class="bi bi-building me-1 text-success"></i>Department
                                        </th>
                                        <th class="border-0 text-center">
                                            <i class="bi bi-gear me-1 text-success"></i>Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $emp)
                                    <tr class="employee-row">
                                        <td class="fw-semibold">
                                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                                #{{ $emp->id }}
                                            </span>
                                        </td>
                                        <td class="fw-medium">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle me-3">
                                                    <i class="bi bi-person-fill text-white"></i>
                                                </div>
                                                {{ $emp->name }}
                                            </div>
                                        </td>
                                        <td class="text-muted">{{ $emp->ic_no }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-envelope text-muted me-2"></i>
                                                <a href="mailto:{{ $emp->email }}" class="text-decoration-none">
                                                    {{ $emp->email }}
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-telephone text-muted me-2"></i>
                                                <a href="tel:{{ $emp->phone_no }}" class="text-decoration-none">
                                                    {{ $emp->phone_no }}
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            @if($emp->department)
                                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                                                    <i class="bi bi-building me-1"></i>{{ $emp->department->name }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded-pill">
                                                    <i class="bi bi-dash-circle me-1"></i>No Department
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('employees.show', $emp->id) }}" 
                                                   class="btn btn-outline-info btn-sm" 
                                                   data-bs-toggle="tooltip" 
                                                   data-bs-placement="top" 
                                                   title="View Details">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('employees.edit', $emp->id) }}" 
                                                   class="btn btn-outline-warning btn-sm" 
                                                   data-bs-toggle="tooltip" 
                                                   data-bs-placement="top" 
                                                   title="Edit Employee">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('employees.destroy', $emp->id) }}" 
                                                      method="POST" 
                                                      style="display:inline;"
                                                      onsubmit="return confirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-outline-danger btn-sm" 
                                                            data-bs-toggle="tooltip" 
                                                            data-bs-placement="top" 
                                                            title="Delete Employee">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-people text-muted" style="font-size: 4rem;"></i>
                            <h5 class="text-muted mt-3">No Employees Found</h5>
                            <p class="text-muted">Get started by adding your first employee.</p>
                            <a href="{{ route('employees.create') }}" class="btn btn-success">
                                <i class="bi bi-person-plus me-2"></i>Add First Employee
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 15px;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
}

.employee-row {
    transition: all 0.3s ease;
}

.employee-row:hover {
    background-color: rgba(25, 135, 84, 0.05);
    transform: scale(1.01);
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.btn-group .btn {
    border-radius: 0;
}

.btn-group .btn:first-child {
    border-radius: 8px 0 0 8px;
}

.btn-group .btn:last-child {
    border-radius: 0 8px 8px 0;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.875rem;
    letter-spacing: 0.5px;
}

.badge {
    font-size: 0.875rem;
    font-weight: 500;
}

.alert {
    border-radius: 10px;
    border: none;
}

.table-responsive {
    border-radius: 10px;
    overflow: hidden;
}

.table {
    margin-bottom: 0;
}

.table tbody tr:last-child td {
    border-bottom: none;
}

.avatar-circle {
    width: 35px;
    height: 35px;
    background: linear-gradient(135deg, #28a745, #20c997);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

@media (max-width: 768px) {
    .card-header h4 {
        font-size: 1.1rem;
    }
    
    .btn-lg {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .table th, .table td {
        padding: 0.5rem;
        font-size: 0.875rem;
    }
    
    .badge {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }
    
    .avatar-circle {
        width: 25px;
        height: 25px;
        font-size: 12px;
    }
    
    .btn-group .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
}
</style>

<script>
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Enhanced delete confirmation
function confirmDelete() {
    return confirm('Are you sure you want to delete this employee? This action cannot be undone.');
}

// Add some animation to the table rows
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('.employee-row');
    rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        setTimeout(() => {
            row.style.transition = 'all 0.5s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>
@endsection
