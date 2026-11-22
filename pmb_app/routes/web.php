<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/program-studi', function () {
    return view('program-studi.index');
})->name('program-studi.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin/dashboard', function (Request $request) {
    if ($request->user()->role !== 'admin') {
        abort(403, 'Akses khusus Admin PMB.');
    }

    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/keluarga', [ProfileController::class, 'keluarga'])->name('keluarga.index');
    Route::post('/profile/keluarga', [ProfileController::class, 'updateKeluarga'])->name('profile.keluarga.store');
});

require __DIR__.'/auth.php';
