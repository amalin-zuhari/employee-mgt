@extends('layouts.app')

@section('content')
<div class="container-fluid px-3">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-building me-2 fs-4"></i>
                            <h4 class="mb-0">Department Management</h4>
                        </div>
                        <a href="{{ route('departments.create') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-plus-circle me-2"></i>Add New Department
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

                    @if($departments->count() > 0)
                        <div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0">
                                            <i class="bi bi-hash me-1 text-primary"></i>Department ID
                                        </th>
                                        <th class="border-0">
                                            <i class="bi bi-tag me-1 text-primary"></i>Department Name
                                        </th>
                                        <th class="border-0 text-center">
                                            <i class="bi bi-gear me-1 text-primary"></i>Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $dept)
                                    <tr class="department-row">
                                        <td class="fw-semibold">
                                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                                                {{ $dept->department_id }}
                                            </span>
                                        </td>
                                        <td class="fw-medium">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-building text-muted me-2"></i>
                                                {{ $dept->name }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('departments.edit', $dept->department_id) }}" 
                                                   class="btn btn-outline-primary btn-sm" 
                                                   data-bs-toggle="tooltip" 
                                                   data-bs-placement="top" 
                                                   title="Edit Department">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('departments.destroy', $dept->department_id) }}" 
                                                      method="POST" 
                                                      style="display:inline;"
                                                      onsubmit="return confirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-outline-danger btn-sm" 
                                                            data-bs-toggle="tooltip" 
                                                            data-bs-placement="top" 
                                                            title="Delete Department">
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
                            <i class="bi bi-building text-muted" style="font-size: 4rem;"></i>
                            <h5 class="text-muted mt-3">No Departments Found</h5>
                            <p class="text-muted">Get started by adding your first department.</p>
                            <a href="{{ route('departments.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>Add First Department
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

.department-row {
    transition: all 0.3s ease;
}

.department-row:hover {
    background-color: rgba(13, 110, 253, 0.05);
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
    return confirm('Are you sure you want to delete this department? This action cannot be undone.');
}

// Add some animation to the table rows
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('.department-row');
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
