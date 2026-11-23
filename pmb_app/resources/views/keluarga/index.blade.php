<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Keluarga - PMB Universitas IPWIJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f3f6fa] text-slate-800 antialiased">
    @php
        $user = auth()->user();
        $namaUser = $user?->name ?? 'Calon Mahasiswa';
        $isEditing = isset($keluargaEdit) && $keluargaEdit !== null;
        $hubunganTerpilih = old('hubungan_keluarga', $keluargaEdit->hubungan ?? 'Ayah');
        $jumlahData = isset($daftarKeluarga) ? $daftarKeluarga->count() : 0;
    @endphp

    <header class="bg-gradient-to-b from-[#0b4f8a] to-[#083b69] text-white shadow-sm">
        <div class="mx-auto max-w-5xl px-4 py-4 sm:px-6">
            <div class="flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-ipwija-header.png') }}" alt="Logo IPWIJA" class="h-10 w-10 rounded-full bg-white p-1 object-contain">
                    <div>
                        <div class="text-sm font-extrabold tracking-wide sm:text-lg">UNIVERSITAS IPWIJA</div>
                        <div class="text-[11px] text-sky-100 sm:text-xs">Portal Calon Mahasiswa - Tahun Akademik 2026/2027</div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('dashboard') }}" class="rounded-lg border border-white/25 bg-white/10 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-white/20">
                        &larr; Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-lg border border-white/25 bg-white/10 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-white/20">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-4 flex flex-wrap items-end justify-between gap-3">
                <div>
                    <div class="text-[11px] font-medium text-sky-200">
                        Alur PMB: Biodata &rarr; <span class="font-bold text-white">Data Keluarga</span> &rarr; Berkas &amp; Seleksi
                    </div>
                    <h1 class="mt-0.5 text-xl font-bold tracking-tight sm:text-2xl">{{ __('Data Keluarga') }}</h1>
                    <p class="mt-0.5 text-xs text-sky-100">Calon Mahasiswa: <span class="font-semibold text-white">{{ $namaUser }}</span></p>
                </div>

                <span class="inline-flex shrink-0 self-start sm:self-center items-center rounded-lg border border-white/20 bg-white/10 px-2.5 py-1 text-[11px] font-semibold text-sky-100">
                    {{ $jumlahData > 0 ? $jumlahData . ' Data Tersimpan' : 'Belum Ada Data' }}
                </span>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 py-6 sm:px-6 space-y-6">
        @if (session('keluarga_status'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-xs font-semibold text-emerald-700">
                {{ session('keluarga_status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-12">
            {{-- Form Tambah / Edit Data Keluarga --}}
            <section class="lg:col-span-6 rounded-2xl border border-slate-200/90 bg-white p-5 shadow-2xs sm:p-6">
                <header class="border-b border-slate-100 pb-4">
                    <h2 class="text-base font-bold text-slate-900">
                        {{ $isEditing ? 'Edit Data Keluarga' : 'Tambah Data Keluarga' }}
                    </h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Sebaiknya lengkapi data Ayah dan Ibu jika tersedia. Jika hanya ada salah satu atau wali, cukup isi yang ada.
                    </p>
                </header>

                <form
                    method="POST"
                    action="{{ $isEditing ? route('keluarga.update', $keluargaEdit->id) : route('keluarga.store') }}"
                    class="mt-5 space-y-4"
                >
                    @csrf
                    @if ($isEditing)
                        @method('PUT')
                    @endif

                    <div>
                        <x-input-label for="nama_keluarga" :value="__('Nama Lengkap')" class="text-xs font-bold text-slate-700" />
                        <x-text-input
                            id="nama_keluarga"
                            name="nama_keluarga"
                            type="text"
                            class="mt-1.5 block w-full rounded-xl border-slate-300 text-sm shadow-2xs focus:border-[#0b4f8a] focus:ring-[#0b4f8a]"
                            :value="old('nama_keluarga', $keluargaEdit->nama ?? '')"
                            placeholder="Masukkan nama lengkap orang tua atau wali"
                            required
                            autofocus
                        />
                        <x-input-error class="mt-1.5" :messages="$errors->get('nama_keluarga')" />
                    </div>

                    <div>
                        <x-input-label for="hubungan_keluarga" :value="__('Hubungan')" class="text-xs font-bold text-slate-700" />
                        <select
                            id="hubungan_keluarga"
                            name="hubungan_keluarga"
                            class="mt-1.5 block w-full rounded-xl border-slate-300 text-sm shadow-2xs focus:border-[#0b4f8a] focus:ring-[#0b4f8a]"
                            required
                        >
                            <option value="Ayah" {{ $hubunganTerpilih === 'Ayah' ? 'selected' : '' }}>Ayah</option>
                            <option value="Ibu" {{ $hubunganTerpilih === 'Ibu' ? 'selected' : '' }}>Ibu</option>
                            <option value="Wali" {{ $hubunganTerpilih === 'Wali' ? 'selected' : '' }}>Wali</option>
                        </select>
                        <x-input-error class="mt-1.5" :messages="$errors->get('hubungan_keluarga')" />
                    </div>

                    <div>
                        <x-input-label for="hp_keluarga" :value="__('No. HP / Telepon')" class="text-xs font-bold text-slate-700" />
                        <x-text-input
                            id="hp_keluarga"
                            name="hp_keluarga"
                            type="text"
                            class="mt-1.5 block w-full rounded-xl border-slate-300 text-sm shadow-2xs focus:border-[#0b4f8a] focus:ring-[#0b4f8a]"
                            :value="old('hp_keluarga', $keluargaEdit->hp ?? '')"
                            placeholder="Contoh: 081234567890"
                        />
                        <p class="mt-1 text-[11px] text-slate-400">Nomor kontak aktif untuk keperluan konfirmasi administrasi PMB.</p>
                        <x-input-error class="mt-1.5" :messages="$errors->get('hp_keluarga')" />
                    </div>

                    <div class="flex flex-wrap items-center gap-2.5 pt-2">
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#0b4f8a] px-5 py-2.5 text-xs font-bold uppercase tracking-wide text-white shadow-2xs transition hover:bg-[#083b69]">
                            {{ $isEditing ? 'PERBARUI DATA' : 'SIMPAN DATA KELUARGA' }}
                        </button>

                        @if ($isEditing)
                            <a href="{{ route('keluarga.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-50">
                                Batal Edit
                            </a>
                        @endif

                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-50">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </form>
            </section>

            {{-- Daftar Data Keluarga Tersimpan --}}
            <section class="lg:col-span-6 rounded-2xl border border-slate-200/90 bg-white p-5 shadow-2xs sm:p-6">
                <header class="border-b border-slate-100 pb-4">
                    <h2 class="text-base font-bold text-slate-900">Data Keluarga Tersimpan</h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Perubahan pada tombol Edit atau Hapus akan langsung memperbarui data di database.
                    </p>
                </header>

                @if ($jumlahData > 0)
                    <div class="mt-4 space-y-3">
                        @foreach ($daftarKeluarga as $item)
                            <div class="flex flex-col justify-between gap-3 rounded-xl border border-slate-200/80 bg-slate-50/60 p-4 sm:flex-row sm:items-center">
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center rounded-md bg-sky-100 px-2 py-0.5 text-[11px] font-bold text-[#0b4f8a]">
                                            {{ $item->hubungan }}
                                        </span>
                                        <span class="text-sm font-bold text-slate-900">{{ $item->nama }}</span>
                                    </div>
                                    <p class="mt-1 text-xs text-slate-600">
                                        No. HP / Telepon: <span class="font-medium text-slate-800">{{ $item->hp ?: 'Belum diisi' }}</span>
                                    </p>
                                </div>

                                <div class="flex items-center gap-2 shrink-0">
                                    <a
                                        href="{{ route('keluarga.index', ['edit' => $item->id]) }}"
                                        class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-100"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('keluarga.destroy', $item->id) }}"
                                        onsubmit="return confirm('Hapus data {{ addslashes($item->nama) }} ({{ addslashes($item->hubungan) }}) dari database?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="inline-flex items-center rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700 transition hover:bg-rose-100"
                                        >
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="mt-5 rounded-xl border border-dashed border-slate-200 bg-slate-50/50 px-4 py-8 text-center">
                        <p class="text-xs font-semibold text-slate-600">Belum ada data keluarga yang tersimpan.</p>
                        <p class="mt-1 text-xs text-slate-400">Gunakan formulir di samping untuk menambahkan data Ayah, Ibu, atau Wali.</p>
                    </div>
                @endif
            </section>
        </div>
    </main>
</body>
</html>