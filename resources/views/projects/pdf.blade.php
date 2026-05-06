<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Projects Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .badge { padding: 4px 8px; border-radius: 4px; color: white; font-size: 12px; }
        .bg-success { background-color: #28a745; }
        .bg-warning { background-color: #ffc107; color: black; }
        .bg-info { background-color: #17a2b8; }
        .bg-danger { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Projects Report</h1>
        <p>Generated on: {{ now()->format('F d, Y H:i:s') }}</p>
        <p>Total Projects: {{ $projects->count() }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Budget</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description ?: 'N/A' }}</td>
                <td><span class="badge bg-{{ $project->getStatusBadgeClass() }}">{{ ucfirst(str_replace('_', ' ', $project->status)) }}</span></td>
                <td><span class="badge bg-{{ $project->getPriorityBadgeClass() }}">{{ ucfirst($project->priority) }}</span></td>
                <td>{{ $project->due_date ? $project->due_date->format('M d, Y') : 'N/A' }}</td>
                <td>{{ $project->budget ? '$' . number_format($project->budget, 2) : 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>