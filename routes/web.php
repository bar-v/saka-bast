<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\ProfileController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeUnit\FunctionUnit;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/datainsert', function () {
    return view('datainsert');
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

Route::get('/Manajemen', function () {
    return view('Manajemen');
})->middleware(['auth', 'verified'])->name('Manajemen');

Route::get('/Manajemenakun', function () {
    return view('Manajemenakun');
})->middleware(['auth', 'verified'])->name('Manajemenakun');

Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('Contact');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Laravel Excel Import Route
Route::get('/Manajemen', [App\Http\Controllers\ArsipController::class, 'index'])->name('Manajemen');
Route::post('/Manajemen.Import', [App\Http\Controllers\ArsipController::class, 'import'])->name('importarsip');
Route::get('/arsip/download-template', [ArsipController::class, 'downloadTemplate'])->name('arsip.template');

Route::get('Manajemen/import', function () {
    return (view('Manajemen/import'));
});

//Create Section
Route::get('/create-Manajemen', [ArsipController::class, 'create'])->name('create-Manajemen');
Route::post('/simpan-Manajemen', [ArsipController::class, 'store'])->name('simpan-Manajemen');

//Edit Section
Route::get('/edit-Manajemen/{id}', [ArsipController::class, 'edit'])->name('edit-Manajemen');
Route::put('/update-Manajemen/{id}', [ArsipController::class, 'update'])->name('update-Manajemen');


//Delete Section
Route::delete('delete-Manajemen/{id}', [ArsipController::class, 'destroy'])->name('delete-Manajemen');
Route::delete('/delete-Manajemen/{id}', [ArsipController::class, 'destroy'])->name('delete-Manajemen')->middleware('auth');