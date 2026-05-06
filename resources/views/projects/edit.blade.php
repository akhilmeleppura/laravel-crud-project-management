@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark py-3">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Project</h5>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">
                            Project Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $project->name) }}" 
                               placeholder="Enter project name"
                               required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Description Field -->
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4" 
                                  placeholder="Enter project description...">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <!-- Status Field -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label fw-bold">
                                Status <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" 
                                    name="status" 
                                    required>
                                <option value="">Select Status</option>
                                <option value="pending" {{ old('status', $project->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ old('status', $project->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Priority Field -->
                        <div class="col-md-6 mb-3">
                            <label for="priority" class="form-label fw-bold">
                                Priority <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('priority') is-invalid @enderror" 
                                    id="priority" 
                                    name="priority" 
                                    required>
                                <option value="">Select Priority</option>
                                <option value="low" {{ old('priority', $project->priority) == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ old('priority', $project->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ old('priority', $project->priority) == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                            @error('priority')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Due Date Field -->
                        <div class="col-md-6 mb-3">
                            <label for="due_date" class="form-label fw-bold">Due Date</label>
                            <input type="date" 
                                   class="form-control @error('due_date') is-invalid @enderror" 
                                   id="due_date" 
                                   name="due_date" 
                                   value="{{ old('due_date', $project->due_date ? $project->due_date->format('Y-m-d') : '') }}">
                            @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Budget Field -->
                        <div class="col-md-6 mb-3">
                            <label for="budget" class="form-label fw-bold">Budget ($)</label>
                            <input type="number" 
                                   class="form-control @error('budget') is-invalid @enderror" 
                                   id="budget" 
                                   name="budget" 
                                   value="{{ old('budget', $project->budget) }}" 
                                   step="0.01" 
                                   min="0"
                                   placeholder="0.00">
                            @error('budget')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Image Upload Field -->
                    <div class="mb-4">
                        <label for="image" class="form-label fw-bold">Project Image</label>
                        <input type="file" 
                               class="form-control @error('image') is-invalid @enderror" 
                               id="image" 
                               name="image" 
                               accept="image/*">
                        <small class="text-muted">Leave empty to keep current image | Max size: 2MB</small>
                        
                        <!-- Current Image / Preview -->
                        @if($project->image)
                        <div class="mt-2">
                            <p class="mb-1 small fw-bold">Current Image:</p>
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->name }}" 
                                 class="img-thumbnail" 
                                 style="max-height: 150px;">
                        </div>
                        @endif
                        
                        <div id="imagePreview" class="mt-2 d-none">
                            <p class="mb-1 small fw-bold">New Image Preview:</p>
                            <img src="#" alt="Preview" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Cancel
                        </a>
                        <button type="submit" class="btn btn-warning px-4">
                            <i class="fas fa-save me-2"></i>Update Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Image preview functionality
document.getElementById('image').addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    const previewImg = preview.querySelector('img');
    
    if (this.files && this.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('d-none');
        }
        
        reader.readAsDataURL(this.files[0]);
    } else {
        preview.classList.add('d-none');
    }
});
</script>
@endpush