<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;
use Inertia\Inertia;

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('professors', ProfessorController::class);


Route::get('/', fn () => redirect()->route('courses.index'))->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        
        return redirect()->route('courses.index');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';