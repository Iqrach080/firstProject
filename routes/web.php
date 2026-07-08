<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;



Route::get('/', function () { 
    return "Hello Iqra+sidra";
});

//  Route::get('/dashboard', function () { 
//     return view('dashboard');

//  })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])
->name('dashboard');


Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/student-dashboard', [StudentController::class, 'index'])->name('student');



Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');


Route::get('/student/create', [StudentController::class, 'create'])
    ->name('student.create');

Route::post('/student/store', [StudentController::class, 'store'])
    ->name('student.store');

    Route::delete('/student/{id}', [StudentController::class, 'destroy'])
    ->name('students.destroy');

    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/classes', [ClassController::class, 'index'])
    ->name('classes.index');
    Route::post('/classes/store', [ClassController::class, 'store'])
    ->name('classes.store');

    Route::get('/classes/{id}/edit', [ClassController::class, 'edit'])
    ->name('classes.edit');

    Route::put('/classes/{id}', [ClassController::class, 'update'])
    ->name('classes.update');

   Route::get('/classes/{id}/sections', [ClassController::class, 'sections'])
    ->name('sections.index');
    Route::get('/classes/{id}/sections', [SectionController::class, 'index'])->name('sections.index');

    
Route::get('/classes/{id}/sections', [SectionController::class, 'index'])->name('sections.index');

Route::post('/classes/{id}/sections', [SectionController::class, 'store'])->name('sections.store');

Route::get('/sections/{id}/edit', [SectionController::class, 'edit'])->name('sections.edit');

Route::put('/sections/{id}', [SectionController::class, 'update'])->name('sections.update');

Route::delete('/sections/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');

Route::get('/classes/{id}/subjects', [SubjectController::class, 'index'])
    ->name('subjects.index');

Route::post('/classes/{id}/subjects', [SubjectController::class, 'store'])
    ->name('subjects.store');

Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])
    ->name('subjects.edit');

Route::put('/subjects/{id}', [SubjectController::class, 'update'])
    ->name('subjects.update');

Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])
    ->name('subjects.destroy');   
Route::delete('/classes/{id}', [ClassController::class, 'destroy'])
    ->name('classes.destroy');

Route::get('/student/{id}', [StudentController::class, 'show'])
    ->name('student.show');

require __DIR__.'/auth.php';

Route::get('/student', [StudentController::class, 'index'])->name('student.index');



