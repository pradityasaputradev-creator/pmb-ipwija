<?php

use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\ProfileController;
use App\Models\Keluarga;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/program-studi', function () {
    return view('program-studi.index');
})->name('program-studi.index');

Route::get('/jalur-pendaftaran', function () {
    return view('jalur-pendaftaran.index');
})->name('jalur-pendaftaran.index');

Route::get('/dashboard', function (Request $request) {
    $user = $request->user();
    $daftarKeluarga = Keluarga::where('user_id', $user->id)
        ->orderBy('id')
        ->get();
    $daftarPendidikan = Pendidikan::where('user_id', $user->id)
        ->orderByDesc('tahun_lulus')
        ->orderByDesc('id')
        ->get();

    return view('dashboard', [
        'user' => $user,
        'daftarKeluarga' => $daftarKeluarga,
        'daftarPendidikan' => $daftarPendidikan,
    ]);
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

    Route::get('/keluarga', [KeluargaController::class, 'keluarga'])->name('keluarga.index');
    Route::post('/keluarga', [KeluargaController::class, 'store'])->name('keluarga.store');
    Route::put('/keluarga/{keluarga}', [KeluargaController::class, 'update'])->name('keluarga.update');
    Route::delete('/keluarga/{keluarga}', [KeluargaController::class, 'destroy'])->name('keluarga.destroy');

    Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index');
    Route::post('/pendidikan', [PendidikanController::class, 'store'])->name('pendidikan.store');
    Route::put('/pendidikan/{pendidikan}', [PendidikanController::class, 'update'])->name('pendidikan.update');
    Route::delete('/pendidikan/{pendidikan}', [PendidikanController::class, 'destroy'])->name('pendidikan.destroy');
});

require __DIR__.'/auth.php';
