<?php

use App\Http\Controllers\ProfileController;
use App\Models\FotoCalonMahasiswa;
use App\Models\Keluarga;
use App\Models\Pendidikan;
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
    $search = $request->query('search');
    $statusFilter = $request->query('status');
    $pendaftar = collect();
    $pendaftarDetail = null;

    return view('admin.dashboard', [
        'tab' => $tab,
        'search' => $search,
        'statusFilter' => $statusFilter,
        'pendaftar' => $pendaftar,
        'pendaftarDetail' => $pendaftarDetail,
    ]);
})->middleware(['auth'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/keluarga', function () {
        if (view()->exists('keluarga.index')) {
            return view('keluarga.index');
        }

        return redirect()->route('profile.edit');
    })->name('keluarga.index');


    Route::get('/program-studi', function () {
        if (view()->exists('program-studi.index')) {
            return view('program-studi.index');
        }

        return redirect()->route('profile.edit');
    })->name('program-studi.index');

    Route::get('/pendidikan', function (Request $request) {
        if (view()->exists('pendidikan.index')) {
            $user = $request->user();
            $daftarPendidikan = Pendidikan::where('user_id', $user->id)
                ->orderBy('id')
                ->get();

            $pendidikanEdit = null;
            if ($request->filled('edit')) {
                $pendidikanEdit = Pendidikan::where('user_id', $user->id)
                    ->whereKey($request->query('edit'))
                    ->first();
            }

            return view('pendidikan.index', [
                'daftarPendidikan' => $daftarPendidikan,
                'pendidikanEdit' => $pendidikanEdit,
            ]);
        }

        return redirect()->route('profile.edit');
    })->name('pendidikan.index');

    Route::post('/pendidikan', function (Request $request) {
        $validated = $request->validate([
            'jenjang' => ['required', 'string', 'max:100'],
            'nama_sekolah' => ['required', 'string', 'max:255'],
            'jurusan' => ['nullable', 'string', 'max:255'],
            'tahun_lulus' => ['required', 'integer', 'min:1970', 'max:' . ((int) date('Y') + 1)],
        ]);

        Pendidikan::create([
            'user_id' => $request->user()->id,
            'jenjang' => $validated['jenjang'],
            'nama_sekolah' => $validated['nama_sekolah'],
            'jurusan' => $validated['jurusan'] ?? null,
            'tahun_lulus' => $validated['tahun_lulus'],
        ]);

        return redirect()
            ->route('pendidikan.index')
            ->with('pendidikan_status', 'Data riwayat pendidikan berhasil disimpan.');
    })->name('pendidikan.store');

    Route::put('/pendidikan/{pendidikan}', function (Request $request, Pendidikan $pendidikan) {
        abort_unless((int) $pendidikan->user_id === (int) $request->user()->id, 403);

        $validated = $request->validate([
            'jenjang' => ['required', 'string', 'max:100'],
            'nama_sekolah' => ['required', 'string', 'max:255'],
            'jurusan' => ['nullable', 'string', 'max:255'],
            'tahun_lulus' => ['required', 'integer', 'min:1970', 'max:' . ((int) date('Y') + 1)],
        ]);

        $pendidikan->update([
            'jenjang' => $validated['jenjang'],
            'nama_sekolah' => $validated['nama_sekolah'],
            'jurusan' => $validated['jurusan'] ?? null,
            'tahun_lulus' => $validated['tahun_lulus'],
        ]);

        return redirect()
            ->route('pendidikan.index')
            ->with('pendidikan_status', 'Data riwayat pendidikan berhasil diperbarui.');
    })->name('pendidikan.update');

    Route::delete('/pendidikan/{pendidikan}', function (Request $request, Pendidikan $pendidikan) {
        abort_unless((int) $pendidikan->user_id === (int) $request->user()->id, 403);

        $pendidikan->delete();

        return redirect()
            ->route('pendidikan.index')
            ->with('pendidikan_status', 'Data riwayat pendidikan berhasil dihapus.');
    })->name('pendidikan.destroy');
});

require __DIR__.'/auth.php';
