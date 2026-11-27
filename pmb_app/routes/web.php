<?php

use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\ProfileController;
use App\Models\Keluarga;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/program-studi', function () {
    return view('program-studi.index');
})->name('program-studi.index');

Route::post('/program-studi/pilih', function (Request $request) {
    $validated = $request->validate([
        'fakultas' => ['required', 'string', 'max:255'],
        'program_pendidikan' => ['required', 'string', 'max:255'],
        'pilihan_prodi' => ['required', 'string', 'max:255'],
        'sistem_kuliah' => ['required', 'string', 'max:255'],
    ]);

    $request->user()->update($validated);

    return redirect()
        ->route('dashboard')
        ->with('status', 'Pilihan program studi berhasil disimpan.');
})->middleware(['auth'])->name('program-studi.pilih');

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

    $tab = $request->query('tab', 'ringkasan');
    $search = trim((string) $request->query('q', ''));
    $statusFilter = $request->query('status', '');
    $detailId = $request->query('detail');

    $query = User::where('role', 'user')
        ->withCount(['keluargas', 'pendidikans'])
        ->latest();

    if ($search !== '') {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('nik', 'like', "%{$search}%");
        });
    }

    if ($statusFilter === 'lengkap') {
        $query->whereNotNull('nik')
              ->whereNotNull('no_hp')
              ->whereNotNull('alamat')
              ->has('keluargas')
              ->has('pendidikans');
    } elseif ($statusFilter === 'belum_lengkap') {
        $query->where(function ($q) {
            $q->whereNull('nik')
              ->orWhereNull('no_hp')
              ->orWhereNull('alamat')
              ->orDoesntHave('keluargas')
              ->orDoesntHave('pendidikans');
        });
    }

    $pendaftar = $query->get();

    $pendaftarDetail = null;
    if ($detailId) {
        $pendaftarDetail = User::where('role', 'user')
            ->with(['keluargas', 'pendidikans'])
            ->find($detailId);
    }

    return view('admin.dashboard', [
        'tab' => $tab,
        'search' => $search,
        'statusFilter' => $statusFilter,
        'pendaftar' => $pendaftar,
        'pendaftarDetail' => $pendaftarDetail,
        'totalAkun' => User::count(),
        'totalCalonMahasiswa' => User::where('role', 'user')->count(),
    ]);
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