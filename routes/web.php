<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\TabelGuruController;
use App\Http\Controllers\QuickCountController;
use App\Http\Controllers\TabelSiswaController;


    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);


// Middleware untuk siswa

Route::middleware(['auth', 'siswa'])->group(function () {
    // Route untuk halaman voting
    Route::get('/Voting-Osis', [VotingController::class, 'index'])->name('welcome');

    // Route untuk menyimpan vote
    Route::post('/Voting-Osis', [VotingController::class, 'store'])->name('vote.store');

    
});


// Middleware untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('Kandidat', KandidatController::class);
    Route::get('admin/Kandidat', [KandidatController::class, 'index'])->name('admin.Kandidat.index');
    Route::get('/Kandidat/create', [KandidatController::class, 'create'])->name('Kandidat.create');     
    Route::delete('admin/Kandidat/{id}', [KandidatController::class, 'destroy']);
    Route::get('/Kandidat/{id}', [KandidatController::class, 'show'])->name('Kandidat.show');
    Route::resource('admin/TabelSiswa', TabelSiswaController::class);
    Route::delete('TabelSiswa/{id}', [TabelSiswaController::class, 'destroy']);
    Route::resource('admin/TabelGuru', TabelGuruController::class);
    Route::get('admin/quickcount',[QuickCountController::class, 'index'])->name('QuickCount.index');
});

// Logout
Route::get('/logout', [SesiController::class, 'logout'])->middleware('auth');
