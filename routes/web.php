<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BerandaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [BerandaController::class, 'index'])->name('dashboard');
    Route::get('/siswa/belajar', [BerandaController::class, 'belajar'])->name('belajar');
    
    Route::get('/mata-pelajaran', [App\Http\Controllers\MataPelajaranController::class, 'index'])->name('mata-pelajaran.index');
    Route::get('/ai-guru', [App\Http\Controllers\AiGuruController::class, 'index'])->name('ai-guru.index');
    Route::post('/ai-guru/tanya', [App\Http\Controllers\AiGuruController::class, 'tanya'])->name('ai-guru.tanya');
    
    // Rute Guru
    Route::get('/guru/asisten-ai', [App\Http\Controllers\AsistenGuruController::class, 'index'])->name('asisten-guru.index');
    Route::post('/guru/asisten-ai/buat-soal', [App\Http\Controllers\AsistenGuruController::class, 'buatSoal'])->name('asisten-guru.buatSoal');
});

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
