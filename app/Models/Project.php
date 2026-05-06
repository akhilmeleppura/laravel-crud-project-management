<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'status',
        'priority',
        'due_date',
        'budget',
        'image',
    ];

    protected $casts = [
        'due_date' => 'date',
        'budget' => 'decimal:2',
    ];

    // Status options
    public static function getStatuses(): array
    {
        return ['pending', 'in_progress', 'completed'];
    }

    // Priority options
    public static function getPriorities(): array
    {
        return ['low', 'medium', 'high'];
    }

    // Get status badge class
    public function getStatusBadgeClass(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'in_progress' => 'info',
            'completed' => 'success',
            default => 'secondary'
        };
    }

    // Get priority badge class
    public function getPriorityBadgeClass(): string
    {
        return match($this->priority) {
            'low' => 'success',
            'medium' => 'warning',
            'high' => 'danger',
            default => 'secondary'
        };
    }
}