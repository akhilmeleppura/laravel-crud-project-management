@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- Back Button -->
        <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary mb-3">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
        
        <div class="card shadow">
            <div class="card-header bg-gradient text-white py-3 d-flex justify-content-between align-items-center"
                 style="background-color: #{{ $project->getStatusBadgeClass() == 'success' ? '28a745' : ($project->getStatusBadgeClass() == 'warning' ? 'ffc107' : '17a2b8') }};">
                <h5 class="mb-0">
                    <i class="fas fa-folder-open me-2"></i>{{ $project->name }}
                </h5>
                <div>
                    <span class="badge bg-light text-dark fs-6">#{{ $project->id }}</span>
                </div>
            </div>
            
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Description -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-muted mb-2">
                                <i class="fas fa-align-left me-2"></i>Description
                            </h6>
                            <p class="fs-5">{{ $project->description ?: '<em class="text-muted">No description provided</em>' }}</p>
                        </div>
                        
                        <!-- Status & Priority -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-muted mb-2">
                                    <i class="fas fa-tasks me-2"></i>Status
                                </h6>
                                <span class="badge bg-{{ $project->getStatusBadgeClass() }} fs-6 px-3 py-2">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-muted mb-2">
                                    <i class="fas fa-flag me-2"></i>Priority
                                </h6>
                                <span class="badge bg-{{ $project->getPriorityBadgeClass() }} fs-6 px-3 py-2">
                                    {{ ucfirst($project->priority) }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Due Date & Budget -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-muted mb-2">
                                    <i class="fas fa-calendar-alt me-2"></i>Due Date
                                </h6>
                                <p class="fs-5 mb-0">
                                    {{ $project->due_date ? $project->due_date->format('F d, Y') : '<em class="text-muted">Not set</em>' }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold text-muted mb-2">
                                    <i class="fas fa-dollar-sign me-2"></i>Budget
                                </h6>
                                <p class="fs-5 mb-0">
                                    {{ $project->budget ? '$' . number_format($project->budget, 2) : '<em class="text-muted">Not set</em>' }}
                                </p>
                            </div>
                        </div>
                        
                        <!-- Timestamps -->
                        <div class="border-top pt-3">
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                Created: {{ $project->created_at->format('M d, Y g:i A') }} |
                                <i class="fas fa-edit me-1"></i>
                                Updated: {{ $project->updated_at->format('M d, Y g:i A') }}
                            </small>
                        </div>
                    </div>
                    
                    <div class="col-md-4 text-center">
                        <!-- Project Image -->
                        @if($project->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->name }}" 
                                 class="img-fluid rounded shadow"
                                 style="max-height: 250px; object-fit: cover;">
                        </div>
                        @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3" style="height: 250px;">
                            <div class="text-center text-muted">
                                <i class="fas fa-image fa-3x mb-2"></i>
                                <p>No image</p>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">
                                <i class="fas fa-edit me-2"></i>Edit Project
                            </a>
                            <button type="button" 
                                    class="btn btn-danger delete-btn" 
                                    data-id="{{ $project->id }}"
                                    data-name="{{ $project->name }}">
                                <i class="fas fa-trash me-2"></i>Delete Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Delete confirmation with SweetAlert
document.querySelector('.delete-btn').addEventListener('click', function() {
    const projectId = this.dataset.id;
    const projectName = this.dataset.name;
    
    Swal.fire({
        title: 'Are you sure?',
        text: `You want to delete "${projectName}"? This cannot be undone!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/projects/${projectId}`;
            
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);
            
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);
            
            document.body.appendChild(form);
            form.submit();
        }
    });
});
</script>
@endpush