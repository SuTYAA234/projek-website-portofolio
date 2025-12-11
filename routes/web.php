<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController; // buat contact

// Route Publik (Bisa diakses siapa saja)
Route::get('/', [ProjectController::class, 'showHome'])->name('home');

// Route untuk Halaman Detail Project (Public)
Route::get('/project/{id}', [ProjectController::class, 'showProject'])->name('project.show');

// Route Dashboard (Hanya bisa diakses setelah Login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk kirim pesan
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// GRUP ROUTE ADMIN (Wajib Login)
Route::middleware('auth')->group(function () {
    // Route Project (CRUD)
    Route::resource('projects', ProjectController::class);

    // Route Lihat Pesan
    Route::get('/admin/messages', [ContactController::class, 'index'])->name('contacts.index');
    
    // Route Hapus Pesan (BARU)
    Route::delete('/admin/messages/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Route Profile (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
