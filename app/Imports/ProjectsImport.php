<?php

namespace App\Imports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProjectsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new Project([
            'name' => $row['name'],
            'description' => $row['description'] ?? null,
            'status' => $row['status'] ?? 'pending',
            'priority' => $row['priority'] ?? 'medium',
            'due_date' => \Carbon\Carbon::parse($row['due_date']) ?? null,
            'budget' => $row['budget'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'nullable|in:pending,in_progress,completed',
            'priority' => 'nullable|in:low,medium,high',
            'due_date' => 'nullable|date',
            'budget' => 'nullable|numeric|min:0',
        ];
    }
}