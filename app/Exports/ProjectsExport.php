<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProjectsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Project::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'Status',
            'Priority',
            'Due Date',
            'Budget',
            'Created At',
        ];
    }

    public function map($project): array
    {
        return [
            $project->id,
            $project->name,
            $project->description,
            $project->status,
            $project->priority,
            $project->due_date,
            $project->budget,
            $project->created_at,
        ];
    }
}