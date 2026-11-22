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
        $hubunganTerpilih = old('hubungan_keluarga', $keluarga->hubungan ?? 'Ayah');
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

            <div class="mt-4">
                <h1 class="text-xl font-bold tracking-tight sm:text-2xl">{{ __('Data Keluarga') }}</h1>
                <p class="mt-0.5 text-xs text-sky-100">Calon Mahasiswa: <span class="font-semibold text-white">{{ $namaUser }}</span></p>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 py-6 sm:px-6">
        <div class="rounded-2xl border border-slate-200/90 bg-white p-5 shadow-2xs sm:p-7">
            <div class="max-w-xl">
                <header class="border-b border-slate-100 pb-4">
                    <h2 class="text-base font-bold text-slate-900">
                        {{ __('Data Keluarga') }}
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        {{ __('Isi informasi orang tua atau wali calon mahasiswa.') }}
                    </p>
                </header>

                @if (session('keluarga_status'))
                    <div class="mt-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-xs font-semibold text-emerald-700">
                        {{ session('keluarga_status') }}
                    </div>
                @endif

                <form method="post" action="{{ route('profile.keluarga.store') }}" class="mt-5 space-y-5">
                    @csrf

                    <div>
                        <x-input-label for="nama_keluarga" :value="__('Nama Lengkap')" class="text-xs font-bold text-slate-700" />
                        <x-text-input
                            id="nama_keluarga"
                            name="nama_keluarga"
                            type="text"
                            class="mt-1.5 block w-full rounded-xl border-slate-300 text-sm shadow-2xs focus:border-[#0b4f8a] focus:ring-[#0b4f8a]"
                            :value="old('nama_keluarga', $keluarga->nama ?? '')"
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
                            :value="old('hp_keluarga', $keluarga->hp ?? '')"
                            placeholder="Masukkan nomor HP atau telepon aktif"
                        />
                        <x-input-error class="mt-1.5" :messages="$errors->get('hp_keluarga')" />
                    </div>

                    <div class="flex flex-wrap items-center gap-3 pt-2">
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#0b4f8a] px-5 py-2.5 text-xs font-bold uppercase tracking-wide text-white shadow-2xs transition hover:bg-[#083b69]">
                            {{ __('SIMPAN DATA KELUARGA') }}
                        </button>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-50">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

