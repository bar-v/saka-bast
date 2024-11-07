<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeUnit\FunctionUnit;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/masuk', function () {
    return view('masuk');
});

Route::get('/Manajemen', function () {
    return view('Manajemen');
});

Route::get('/beranda', function () {
    return view('beranda');
});

# Jangan di Ubah

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Laravel Excel Import Route
Route::get('arsip/import', [App\Http\Controllers\ArsipController::class, 'index']);
Route::post('arsip/import', [App\Http\Controllers\ArsipController::class, 'importExcelData']);
// Route::post('Manajemen', [ArsipController::class, 'import'])->name('Manajemen.import');

Route::get('Manajemen/import', function () {
    return (view('Manajemen/import'));
});
