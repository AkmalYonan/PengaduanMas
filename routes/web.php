<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth:web,petugas')->group(function () {
    Route::get('/dashboard', [PengaduanController::class, 'index'])->name('dashboard');
    Route::post('/send-laporan', [PengaduanController::class, 'store'])->name('send-laporan');

    Route::get('/history', [PengaduanController::class, 'history'])->name('history');
    Route::get('/history/{id}', [PengaduanController::class, 'show'])->name('history-detail');
    Route::patch('/history/edit/{id}', [PengaduanController::class, 'edit'])->name('history.edit');
    Route::get('/history/downloadimg/{id}', [PengaduanController::class, 'downloadIMG'])->name('history-detail-image-download');
});

Route::middleware('auth:petugas')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/add/petugas', [AdminController::class, 'createPetugas'])->name('admin.addpetugas');
    Route::get('/admin/archive', [AdminController::class, 'archive'])->name('admin.archive');
    Route::post('/admin/{id}/komentar', [TanggapanController::class, 'store'])->name('admin.komentar');
    Route::patch('/history/{id}/proses', [PengaduanController::class, 'proses'])->name('history.proses');
    Route::patch('/history/{id}/selesai', [PengaduanController::class, 'selesai'])->name('history.selesai');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
