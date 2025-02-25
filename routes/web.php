<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\CreateStudent;
use Illuminate\Support\Facades\Route;
use App\Livewire\ListStudents;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/students', ListStudents::class)->name('students.index');
    Route::get('/create-students', CreateStudent::class)->name('students.create');

});


require __DIR__ . '/auth.php';
require __DIR__ . '/console.php';
