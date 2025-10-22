@extends('layouts.app')

@section('content')
<div class="container-fluid px-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-plus me-2 fs-4"></i>
                        <h4 class="mb-0">Add New Employee</h4>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    {{-- Show validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('employees.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold">
                                        <i class="bi bi-person me-1 text-success"></i>Full Name
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="bi bi-person text-muted"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                               id="name"
                                               name="name" 
                                               value="{{ old('name') }}" 
                                               placeholder="Enter full name"
                                               required>
                                        <div class="invalid-feedback">
                                            @error('name')
                                                {{ $message }}
                                            @else
                                                Please provide a valid name.
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="ic_no" class="form-label fw-semibold">
                                        <i class="bi bi-card-text me-1 text-success"></i>IC Number
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="bi bi-credit-card text-muted"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control form-control-lg @error('ic_no') is-invalid @enderror" 
                                               id="ic_no"
                                               name="ic_no" 
                                               value="{{ old('ic_no') }}" 
                                               placeholder="Enter IC number"
                                               required>
                                        <div class="invalid-feedback">
                                            @error('ic_no')
                                                {{ $message }}
                                            @else
                                                Please provide a valid IC number.
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="bi bi-envelope me-1 text-success"></i>Email Address
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="bi bi-envelope text-muted"></i>
                                        </span>
                                        <input type="email" 
                                               class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                               id="email"
                                               name="email" 
                                               value="{{ old('email') }}" 
                                               placeholder="Enter email address"
                                               required>
                                        <div class="invalid-feedback">
                                            @error('email')
                                                {{ $message }}
                                            @else
                                                Please provide a valid email address.
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="phone_no" class="form-label fw-semibold">
                                        <i class="bi bi-telephone me-1 text-success"></i>Phone Number
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="bi bi-phone text-muted"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control form-control-lg @error('phone_no') is-invalid @enderror" 
                                               id="phone_no"
                                               name="phone_no" 
                                               value="{{ old('phone_no') }}" 
                                               placeholder="Enter phone number"
                                               required>
                                        <div class="invalid-feedback">
                                            @error('phone_no')
                                                {{ $message }}
                                            @else
                                                Please provide a valid phone number.
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="dept_id" class="form-label fw-semibold">
                                <i class="bi bi-building me-1 text-success"></i>Department
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-building text-muted"></i>
                                </span>
                                <select class="form-select form-select-lg @error('dept_id') is-invalid @enderror" 
                                        id="dept_id"
                                        name="dept_id" 
                                        required>
                                    <option value="">-- Select Department --</option>
                                    @foreach ($departments as $dept)
                                        <option value="{{ $dept->department_id }}" {{ old('dept_id') == $dept->department_id ? 'selected' : '' }}>
                                            {{ $dept->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('dept_id')
                                        {{ $message }}
                                    @else
                                        Please select a department.
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary btn-lg me-md-2">
                                <i class="bi bi-arrow-left me-2"></i>Back to List
                            </a>
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Save Employee
                            </button>
                        </div>
                    </form>
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

.form-control:focus, .form-select:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
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

.input-group-text {
    border-radius: 10px 0 0 10px;
}

.form-control, .form-select {
    border-radius: 0 10px 10px 0;
}

.alert {
    border-radius: 10px;
    border: none;
}

.form-select {
    border-left: 0;
}

@media (max-width: 768px) {
    .card-header h4 {
        font-size: 1.1rem;
    }
    
    .btn-lg {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .form-control-lg, .form-select-lg {
        padding: 0.5rem 0.75rem;
        font-size: 0.9rem;
    }
    
    .input-group-text {
        padding: 0.5rem 0.75rem;
    }
    
    .row .col-md-6 {
        margin-bottom: 1rem;
    }
}
</style>

<script>
// Bootstrap form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
@endsection
