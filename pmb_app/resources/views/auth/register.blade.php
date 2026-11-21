<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Akun - PMB Universitas IPWIJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-800 antialiased">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-12">
        <!-- Panel Kiri: Identitas & Alur Ringkas PMB IPWIJA -->
        <div class="relative lg:col-span-7 flex flex-col justify-between p-8 sm:p-12 text-white overflow-hidden">
            <img
                src="{{ asset('images/gedung-ipwija.jpg') }}"
                alt="Gedung Universitas IPWIJA"
                class="absolute inset-0 h-full w-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-blue-950/80 to-slate-950/90"></div>

            <div class="relative z-10 flex items-center gap-3" style="display: flex; align-items: center; gap: 12px; position: relative; z-index: 10;">
                <div
                    class="h-12 w-12 rounded-full bg-white/95 p-1 shadow-md border border-white/40 flex items-center justify-center shrink-0 overflow-hidden"
                    style="width: 50px; height: 50px; padding: 4px; border-radius: 9999px; background: rgba(255, 255, 255, 0.95); display: flex; align-items: center; justify-content: center; flex-shrink: 0; overflow: hidden;"
                >
                    <img
                        src="{{ asset('images/logo-ipwija-header.png') }}"
                        alt="Logo Universitas IPWIJA"
                        class="h-full w-full object-contain rounded-full"
                        style="width: 100%; height: 100%; object-fit: contain; border-radius: 9999px; display: block;"
                    >
                </div>
                <div>
                    <p class="text-xs uppercase tracking-widest text-amber-300 font-semibold">Portal Penerimaan Mahasiswa Baru</p>
                    <h1 class="text-lg font-bold tracking-tight text-white">Universitas IPWIJA</h1>
                </div>
            </div>

            <div class="relative z-10 my-12 max-w-xl">
                <span class="inline-block rounded-full bg-amber-500/20 border border-amber-400/40 px-3.5 py-1 text-xs font-medium text-amber-200 mb-4">
                    Registrasi Calon Mahasiswa Baru
                </span>
                <h2 class="text-3xl sm:text-4xl font-bold leading-tight text-white">
                    Buat akun pendaftar terlebih dahulu sebelum memilih jalur & melengkapi data.
                </h2>
                <p class="mt-4 text-sm sm:text-base text-slate-200/90 leading-relaxed">
                    Proses dibuat bertahap agar pengisian lebih ringan: mulai dari pembuatan akun, pemilihan jalur/program studi, hingga kelengkapan berkas di dalam portal.
                </p>

                <!-- Ringkasan 3 Langkah -->
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-3 text-left">
                    <div class="rounded-xl bg-white/10 backdrop-blur-sm border border-white/15 p-3.5">
                        <div class="text-xs font-bold text-amber-300">LANGKAH 01</div>
                        <div class="mt-1 text-sm font-semibold text-white">BUAT AKUN</div>
                        <p class="mt-1 text-xs text-slate-200/80">Daftar dengan nama, email aktif, dan kata sandi.</p>
                    </div>
                    <div class="rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 p-3.5">
                        <div class="text-xs font-bold text-slate-300">LANGKAH 02</div>
                        <div class="mt-1 text-sm font-semibold text-white">JALUR & PRODI</div>
                        <p class="mt-1 text-xs text-slate-300/80">Pilih jenjang, program studi, dan jalur masuk.</p>
                    </div>
                    <div class="rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 p-3.5">
                        <div class="text-xs font-bold text-slate-300">LANGKAH 03</div>
                        <div class="mt-1 text-sm font-semibold text-white">BERKAS & SELEKSI</div>
                        <p class="mt-1 text-xs text-slate-300/80">Lengkapi profil, dokumen, dan pantau status.</p>
                    </div>
                </div>
            </div>

            <div class="relative z-10 text-xs text-slate-300/80">
                &copy; {{ date('Y') }} PMB Universitas IPWIJA. Seluruh hak cipta dilindungi.
            </div>
        </div>

        <!-- Panel Kanan: Kartu Form Registrasi -->
        <div class="lg:col-span-5 flex items-center justify-center bg-slate-100 p-6 sm:p-10">
            <div class="w-full max-w-md rounded-2xl bg-white p-7 sm:p-8 shadow-xl border border-slate-200/80">
                <!-- Indikator Langkah Ringkas (Gaya UGM) -->
                <div class="flex items-center justify-between gap-2 pb-5 mb-6 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-900 text-xs font-bold text-white">
                            1
                        </span>
                        <span class="text-xs font-semibold text-blue-950">Akun Pendaftar</span>
                    </div>
                    <div class="h-px flex-1 bg-slate-200"></div>
                    <div class="flex items-center gap-2 opacity-60">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-slate-200 text-xs font-bold text-slate-600">
                            2
                        </span>
                        <span class="text-xs font-medium text-slate-500">Jalur & Profil</span>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-slate-900">Registrasi Akun</h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Isi data dasar di bawah untuk membuat akun PMB IPWIJA.
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nama Lengkap')" class="text-slate-700 font-medium" />
                        <x-text-input
                            id="name"
                            class="block mt-1.5 w-full rounded-xl border-slate-300 focus:border-blue-900 focus:ring-blue-900"
                            type="text"
                            name="name"
                            :value="old('name')"
                            placeholder="Masukan Nama Lengkap Anda"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email Aktif')" class="text-slate-700 font-medium" />
                        <x-text-input
                            id="email"
                            class="block mt-1.5 w-full rounded-xl border-slate-300 focus:border-blue-900 focus:ring-blue-900"
                            type="email"
                            name="email"
                            :value="old('email')"
                            placeholder="Masukan Email Anda"
                            required
                            autocomplete="username"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Kata Sandi')" class="text-slate-700 font-medium" />
                        <x-text-input
                            id="password"
                            class="block mt-1.5 w-full rounded-xl border-slate-300 focus:border-blue-900 focus:ring-blue-900"
                            type="password"
                            name="password"
                            placeholder="Masukan Password Anda"
                            required
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-slate-700 font-medium" />
                        <x-text-input
                            id="password_confirmation"
                            class="block mt-1.5 w-full rounded-xl border-slate-300 focus:border-blue-900 focus:ring-blue-900"
                            type="password"
                            name="password_confirmation"
                            placeholder="Masukan Password Anda"
                            required
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5" />
                    </div>

                    <div class="pt-2">
                        <button
                            type="submit"
                            class="w-full rounded-xl bg-blue-900 hover:bg-blue-800 active:bg-blue-950 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2"
                        >
                            {{ __('Daftar Akun') }}
                        </button>
                    </div>

                    <div class="pt-3 text-center text-sm text-slate-600">
                        {{ __('Sudah punya akun?') }}
                        <a href="{{ route('login') }}" class="font-semibold text-amber-600 hover:text-amber-700 underline underline-offset-2">
                            {{ __('Masuk di sini') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>