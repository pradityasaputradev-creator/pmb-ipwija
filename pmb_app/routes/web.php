<?php
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\ProfileController;
use App\Models\FotoCalonMahasiswa;
use App\Models\Keluarga;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    if (view()->exists('welcome')) {
        return view('welcome');
    }

    return redirect()->route('login');
});

Route::post('/program-studi/pilih', function (Request $request) {
    $validated = $request->validate([
        'fakultas' => ['nullable', 'string', 'max:255'],
        'program_pendidikan' => ['nullable', 'string', 'max:255'],
        'pilihan_prodi' => ['required', 'string', 'max:255'],
        'sistem_kuliah' => ['nullable', 'string', 'max:255'],
    ]);

    $user = $request->user();
    $hadProdi = filled($user->pilihan_prodi);

    $user->update($validated);

    $message = $hadProdi
        ? 'Pilihan program studi berhasil diubah.'
        : 'Pilihan program studi berhasil disimpan.';

    return redirect()
        ->route('dashboard')
        ->with('status', $message);
})->middleware(['auth'])->name('program-studi.pilih');

Route::get('/jalur-pendaftaran', function () {
    return view('jalur-pendaftaran.index');
})->middleware(['auth'])->name('jalur-pendaftaran.index');

Route::post('/dashboard/foto', function (Request $request) {
    $request->validate([
        'foto' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
    ], [
        'foto.required' => 'Pilih file foto terlebih dahulu.',
        'foto.image' => 'File yang diunggah harus berupa gambar.',
        'foto.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WEBP.',
        'foto.max' => 'Ukuran foto maksimal 2 MB.',
    ]);

    $user = $request->user();
    $existingFoto = FotoCalonMahasiswa::where('user_id', $user->id)->first();

    if ($existingFoto?->path_foto && Storage::disk('public')->exists($existingFoto->path_foto)) {
        Storage::disk('public')->delete($existingFoto->path_foto);
    }

    $path = $request->file('foto')->store('foto-calon-mahasiswa', 'public');

    FotoCalonMahasiswa::updateOrCreate(
        ['user_id' => $user->id],
        ['path_foto' => $path]
    );

    return redirect()
        ->route('dashboard')
        ->with('status', 'Foto calon mahasiswa berhasil disimpan.');
})->middleware(['auth'])->name('dashboard.foto.update');

Route::get('/dashboard', function (Request $request) {
    $user = $request->user();
    $daftarKeluarga = Keluarga::where('user_id', $user->id)
        ->orderBy('id')
        ->get();
    $daftarPendidikan = Pendidikan::where('user_id', $user->id)
        ->orderBy('id')
        ->get();
    $fotoCalonMahasiswa = FotoCalonMahasiswa::where('user_id', $user->id)->first();

    return view('dashboard', [
        'user' => $user,
        'daftarKeluarga' => $daftarKeluarga,
        'daftarPendidikan' => $daftarPendidikan,
        'fotoCalonMahasiswa' => $fotoCalonMahasiswa,
    ]);
})->middleware(['auth'])->name('dashboard');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/keluarga', [KeluargaController::class, 'keluarga'])->name('keluarga.index');
    Route::post('/keluarga', [KeluargaController::class, 'store'])->name('keluarga.store');
    Route::put('/keluarga/{keluarga}', [KeluargaController::class, 'update'])->name('keluarga.update');
    Route::delete('/keluarga/{keluarga}', [KeluargaController::class, 'destroy'])->name('keluarga.destroy');

    Route::get('/program-studi', function () {
        if (view()->exists('program-studi.index')) {
            return view('program-studi.index');
        }

        return redirect()->route('profile.edit');
    })->name('program-studi.index');

    Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index');
    Route::post('/pendidikan', [PendidikanController::class, 'store'])->name('pendidikan.store');
    Route::put('/pendidikan/{pendidikan}', [PendidikanController::class, 'update'])->name('pendidikan.update');
    Route::delete('/pendidikan/{pendidikan}', [PendidikanController::class, 'destroy'])->name('pendidikan.destroy');
});

require __DIR__.'/auth.php';

