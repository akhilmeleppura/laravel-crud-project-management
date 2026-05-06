@extends('layouts.app')

@section('title', 'All Projects')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2 class="fw-bold"><i class="fas fa-tasks me-2"></i>Projects Dashboard</h2>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Projects</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['pending'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">In Progress</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['in_progress'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-spinner fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['completed'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filters & Actions Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-wrap justify-content-between align-items-center">
        <h6 class="m-0 fw-bold text-primary"><i class="fas fa-filter me-2"></i>Search & Filter</h6>
        
        <div class="d-flex gap-2 flex-wrap mt-2 mt-md-0 align-items-center">
            
            <!-- ============================================ -->
            <!-- ITEMS PER PAGE DROPDOWN                      -->
            <!-- ============================================ -->
            <div class="d-flex align-items-center bg-light rounded px-3 py-2">
                <label for="per_page" class="form-label me-2 mb-0 fw-semibold text-muted" style="font-size: 0.85rem;">
                    <i class="fas fa-list-ol me-1"></i>Show:
                </label>
                <select class="form-select form-select-sm border-0 bg-transparent fw-bold text-primary" 
                        id="per_page" 
                        name="per_page" 
                        style="width: auto; min-width: 65px; cursor: pointer;" 
                        onchange="changePerPage(this.value)">
                    <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                </select>
                <span class="text-muted ms-1" style="font-size: 0.8rem;">/ page</span>
            </div>

            <!-- Export Buttons -->
            <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-file-export me-1"></i>Export
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('projects.export.excel') }}">
                        <i class="fas fa-file-excel me-2 text-success"></i>Excel
                    </a></li>
                    <li><a class="dropdown-item" href="{{ route('projects.export.csv') }}">
                        <i class="fas fa-file-csv me-2 text-info"></i>CSV
                    </a></li>
                    <li><a class="dropdown-item" href="{{ route('projects.export.pdf') }}">
                        <i class="fas fa-file-pdf me-2 text-danger"></i>PDF
                    </a></li>
                </ul>
            </div>
            
            <!-- Import Button -->
            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                <i class="fas fa-file-import me-1"></i>Import
            </button>
            
            <!-- Add New Button -->
            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i>Add New
            </a>
        </div>
    </div>
    
    <div class="card-body">
        <form action="{{ route('projects.index') }}" method="GET" class="row g-3">
            <!-- Search Input -->
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" 
                           class="form-control" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search by name or description...">
                </div>
            </div>
            
            <!-- Status Filter -->
            <div class="col-md-3">
                <select class="form-select" name="status">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            
            <!-- Priority Filter -->
            <div class="col-md-3">
                <select class="form-select" name="priority">
                    <option value="">All Priorities</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>
            
            <!-- Filter & Reset Buttons -->
            <div class="col-md-2">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-outline-primary w-100">
                        <i class="fas fa-filter me-1"></i>Filter
                    </button>
                    <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Projects Table -->
<div class="card shadow">
    <div class="card-body">
        @if($projects->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>
                            <a href="{{ Request::fullUrlWithQuery(['sort_by' => 'name', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}" 
                               class="text-white text-decoration-none">
                                Name 
                                @if(request('sort_by') == 'name')
                                    <i class="fas fa-sort-{{ request('sort_order') == 'asc' ? 'up' : 'down' }}"></i>
                                @else
                                    <i class="fas fa-sort"></i>
                                @endif
                            </a>
                        </th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Due Date</th>
                        <th>Budget</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $index => $project)
                    <tr>
                        <td>{{ ($projects->currentPage() - 1) * $projects->perPage() + $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" 
                                     alt="{{ $project->name }}" 
                                     class="rounded-circle me-2" 
                                     width="40" height="40"
                                     style="object-fit: cover;">
                                @endif
                                <div>
                                    <strong>{{ $project->name }}</strong>
                                    @if($project->description)
                                    <br><small class="text-muted">{{ \Illuminate\Support\Str::limit($project->description, 50) }}</small>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-{{ $project->getStatusBadgeClass() }}">
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $project->getPriorityBadgeClass() }}">
                                {{ ucfirst($project->priority) }}
                            </span>
                        </td>
                        <td>{{ $project->due_date ? $project->due_date->format('M d, Y') : '-' }}</td>
                        <td>{{ $project->budget ? '$' . number_format($project->budget, 2) : '-' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('projects.show', $project) }}" 
                                   class="btn btn-info" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('projects.edit', $project) }}" 
                                   class="btn btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" 
                                        class="btn btn-danger delete-btn" 
                                        data-id="{{ $project->id }}"
                                        data-name="{{ $project->name }}"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Enhanced Pagination Info -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">
            <div class="text-muted">
                <span class="fw-semibold">Showing {{ $projects->firstItem() ?? 0 }}</span> 
                to <span class="fw-semibold">{{ $projects->lastItem() ?? 0 }}</span> 
                of <span class="fw-bold text-primary">{{ $projects->total() }}</span> entries
                
                @if($perPage)
                <span class="badge bg-secondary ms-2">{{ $perPage }}/page</span>
                @endif
            </div>
            
            <!-- Pagination Links -->
            <div>
                {{ $projects->links('pagination::bootstrap-5') }}
            </div>
        </div>
        
        @else
        <div class="text-center py-5">
            <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">No projects found</h4>
            <p class="text-muted">Start by creating your first project!</p>
            <a href="{{ route('projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Create Project
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-file-import me-2"></i>Import Projects</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('projects.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Select File (Excel/CSV)</label>
                        <input type="file" name="file" class="form-control" required accept=".xlsx,.csv,.xls">
                        <small class="text-muted">Supported formats: .xlsx, .xls, .csv (Max: 10MB)</small>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Template Format:</strong><br>
                        Required columns: name<br>
                        Optional columns: description, status, priority, due_date, budget
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload me-2"></i>Import
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Custom Styles for Per Page Dropdown */
.border-left-primary {
    border-left: 4px solid #0d6efd !important;
}
.border-left-warning {
    border-left: 4px solid #ffc107 !important;
}
.border-left-info {
    border-left: 4px solid #17a2b8 !important;
}
.border-left-success {
    border-left: 4px solid #28a745 !important;
}

/* Table hover effect */
.table-hover tbody tr:hover {
    background-color: rgba(13, 110, 253, 0.05);
    transform: scale(1.005);
    transition: all 0.2s ease;
}

/* Badge animation */
.badge {
    transition: all 0.3s ease;
}

.badge:hover {
    transform: scale(1.1);
}

/* Pagination styling */
.pagination .page-link {
    border-radius: 0.375rem !important;
    margin: 0 2px;
}

.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-header {
        flex-direction: column;
        align-items: flex-start !important;
    }
    
    .card-header > div {
        width: 100%;
        margin-top: 10px;
    }
    
    .d-flex.gap-2 {
        justify-content: space-between !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
// ============================================
// DELETE CONFIRMATION WITH SWEETALERT
// ============================================
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function() {
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
            cancelButtonText: 'Cancel',
            showClass: {
                popup: 'animate__animated animate__fadeInDown animate__faster'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp animate__faster'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Create form and submit
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/projects/${projectId}`;
                
                // Add CSRF token
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);
                
                // Add method spoofing for DELETE
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
});

// ============================================
// CHANGE ITEMS PER PAGE FUNCTION
// ============================================
function changePerPage(perPageValue) {
    // Show loading state
    Swal.fire({
        title: 'Updating...',
        html: 'Loading records...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Get current URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    
    // Set or update per_page parameter
    urlParams.set('per_page', perPageValue);
    
    // Reset to page 1 when changing per page
    urlParams.delete('page');
    
    // Build new URL
    const newUrl = `${window.location.pathname}?${urlParams.toString()}`;
    
    // Small delay for visual feedback then redirect
    setTimeout(() => {
        window.location.href = newUrl;
    }, 300);
}

// ============================================
// KEYBOARD SHORTCUTS
// ============================================
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + / to focus on search
    if ((e.ctrlKey || e.metaKey) && e.key === '/') {
        e.preventDefault();
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            searchInput.focus();
            searchInput.select();
        }
    }
});

// ============================================
// AUTO-HIDE ALERTS AFTER 5 SECONDS
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert-dismissible');
        alerts.forEach(alert => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        });
    }, 5000);

    // Initialize tooltips if any
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endpush