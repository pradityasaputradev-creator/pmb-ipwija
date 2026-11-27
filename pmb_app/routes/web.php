<?php

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

    $request->user()->update($validated);

    return redirect()
        ->route('dashboard')
        ->with('status', 'Pilihan program studi berhasil disimpan.');
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

Route::get('/admin/dashboard', function (Request $request) {
    if ($request->user()->role !== 'admin') {
        abort(403, 'Akses khusus Admin PMB.');
    }

    $tab = $request->query('tab', 'ringkasan');
    $search = trim((string) $request->query('q', ''));
    $statusFilter = trim((string) $request->query('status', ''));

    $totalAkun = User::count();
    $totalCalonMahasiswa = User::where(function ($query) {
        $query->whereNull('role')->orWhere('role', '!=', 'admin');
    })->count();

    $pendaftarQuery = User::query()
        ->where(function ($query) {
            $query->whereNull('role')->orWhere('role', '!=', 'admin');
        })
        ->withCount(['keluargas', 'pendidikans']);

    if ($search !== '') {
        $pendaftarQuery->where(function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('nik', 'like', "%{$search}%");
        });
    }

    if ($statusFilter === 'lengkap') {
        $pendaftarQuery
            ->whereNotNull('nik')->where('nik', '!=', '')
            ->whereNotNull('no_hp')->where('no_hp', '!=', '')
            ->whereNotNull('alamat')->where('alamat', '!=', '')
            ->has('keluargas')
            ->has('pendidikans');
    } elseif ($statusFilter === 'belum_lengkap') {
        $pendaftarQuery->where(function ($query) {
            $query->whereNull('nik')->orWhere('nik', '')
                ->orWhereNull('no_hp')->orWhere('no_hp', '')
                ->orWhereNull('alamat')->orWhere('alamat', '')
                ->orDoesntHave('keluargas')
                ->orDoesntHave('pendidikans');
        });
    }

    $pendaftar = $pendaftarQuery
        ->latest('id')
        ->get();

    $pendaftarDetail = null;
    if ($request->filled('detail')) {
        $pendaftarDetail = User::with(['keluargas', 'pendidikans', 'fotoCalonMahasiswa'])
            ->where(function ($query) {
                $query->whereNull('role')->orWhere('role', '!=', 'admin');
            })
            ->whereKey($request->query('detail'))
            ->first();
    }

    return view('admin.dashboard', [
        'tab' => $tab,
        'search' => $search,
        'statusFilter' => $statusFilter,
        'totalAkun' => $totalAkun,
        'totalCalonMahasiswa' => $totalCalonMahasiswa,
        'pendaftar' => $pendaftar,
        'pendaftarDetail' => $pendaftarDetail,
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