@extends('layouts.app')

@section('content')
<div class="container-fluid px-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-info text-white">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-badge me-2 fs-4"></i>
                        <h4 class="mb-0">Employee Details</h4>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <div class="employee-avatar mb-3">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <h3 class="text-primary mb-1">{{ $employee->name }}</h3>
                            <p class="text-muted mb-0">Employee ID: #{{ $employee->id }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="info-card mb-3">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-person text-info"></i>
                                    </div>
                                    <div class="info-content">
                                        <label class="info-label">Full Name</label>
                                        <span class="info-value">{{ $employee->name }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="info-card mb-3">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-credit-card text-info"></i>
                                    </div>
                                    <div class="info-content">
                                        <label class="info-label">IC Number</label>
                                        <span class="info-value">{{ $employee->ic_no }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="info-card mb-3">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-envelope text-info"></i>
                                    </div>
                                    <div class="info-content">
                                        <label class="info-label">Email Address</label>
                                        <span class="info-value">
                                            <a href="mailto:{{ $employee->email }}" class="text-decoration-none">
                                                {{ $employee->email }}
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="info-card mb-3">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-telephone text-info"></i>
                                    </div>
                                    <div class="info-content">
                                        <label class="info-label">Phone Number</label>
                                        <span class="info-value">
                                            <a href="tel:{{ $employee->phone_no }}" class="text-decoration-none">
                                                {{ $employee->phone_no }}
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="info-card mb-3">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="bi bi-building text-info"></i>
                                    </div>
                                    <div class="info-content">
                                        <label class="info-label">Department</label>
                                        <span class="info-value">
                                            @if($employee->department)
                                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                                                    <i class="bi bi-building me-1"></i>{{ $employee->department->name }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded-pill">
                                                    <i class="bi bi-dash-circle me-1"></i>No Department Assigned
                                                </span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                        <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary btn-lg me-md-2">
                            <i class="bi bi-arrow-left me-2"></i>Back to List
                        </a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-lg">
                            <i class="bi bi-pencil-square me-2"></i>Edit Employee
                        </a>
                    </div>
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
    transform: translateY(-5px);
}

.employee-avatar {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #17a2b8, #20c997);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: white;
    margin: 0 auto;
    box-shadow: 0 4px 15px rgba(23, 162, 184, 0.3);
}

.info-card {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 1rem;
    border-left: 4px solid #17a2b8;
    transition: all 0.3s ease;
}

.info-card:hover {
    background: #e9ecef;
    transform: translateX(5px);
}

.info-item {
    display: flex;
    align-items: center;
}

.info-icon {
    width: 40px;
    height: 40px;
    background: rgba(23, 162, 184, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    font-size: 1.2rem;
}

.info-content {
    flex: 1;
}

.info-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 600;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
}

.info-value {
    display: block;
    font-size: 1.1rem;
    font-weight: 500;
    color: #212529;
}

.btn {
    border-radius: 10px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.badge {
    font-size: 0.875rem;
    font-weight: 500;
}

@media (max-width: 768px) {
    .card-header h4 {
        font-size: 1.1rem;
    }
    
    .btn-lg {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .employee-avatar {
        width: 60px;
        height: 60px;
        font-size: 2rem;
    }
    
    .info-card {
        padding: 0.75rem;
    }
    
    .info-icon {
        width: 30px;
        height: 30px;
        font-size: 1rem;
        margin-right: 0.75rem;
    }
    
    .info-label {
        font-size: 0.75rem;
    }
    
    .info-value {
        font-size: 1rem;
    }
}
</style>
@endsection
