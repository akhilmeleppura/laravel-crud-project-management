<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home route - redirect to projects
Route::get('/', function () {
    return redirect()->route('projects.index');
});

// Resource routes for projects (CRUD)
Route::resource('projects', ProjectController::class);

// Export/Import routes
Route::get('/projects/export/excel', [ProjectController::class, 'exportExcel'])->name('projects.export.excel');
Route::get('/projects/export/csv', [ProjectController::class, 'exportCSV'])->name('projects.export.csv');
Route::get('/projects/export/pdf', [ProjectController::class, 'exportPDF'])->name('projects.export.pdf');
Route::post('/projects/import', [ProjectController::class, 'import'])->name('projects.import');

// Auth routes (OPTIONAL - only if you installed laravel/ui)
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');