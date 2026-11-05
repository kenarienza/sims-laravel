<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Management routes (list, show, create/edit/delete) are restricted to Staff and Administrators.
    // Student-role accounts use their own self-service portal on the dashboard instead.
    Route::middleware('staff')->group(function () {
        Route::get('/students', [StudentController::class, 'index'])->name('students.index');
        Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
        Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');

        // Create/Edit/Delete are restricted to Administrators. Registered before the
        // {student}/{subject}/{enrollment} show/edit wildcards so literal segments
        // like "create" are not swallowed by the wildcard routes below.
        Route::middleware('admin')->group(function () {
            Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
            Route::post('/students', [StudentController::class, 'store'])->name('students.store');
            Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
            Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
            Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

            Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
            Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
            Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
            Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
            Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

            Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
            Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
            Route::get('/enrollments/{enrollment}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
            Route::put('/enrollments/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollments.update');
            Route::delete('/enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
        });

        // Show route (students only) is viewable by Staff and Administrators.
        Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    });
});

require __DIR__.'/auth.php';
