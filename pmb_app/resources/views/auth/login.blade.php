<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk Akun - PMB Universitas IPWIJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-900 text-slate-800 antialiased overflow-x-hidden">
    <div class="relative min-h-screen w-full flex flex-col justify-between">
        <!-- Background Foto Kampus Penuh -->
        <img
            src="{{ asset('images/gedung-ipwija.jpg') }}"
            alt="Kampus Universitas IPWIJA"
            class="fixed inset-0 h-full w-full object-cover z-0"
        >
        <!-- Overlay Gelap Khas Portal Kampus -->
        <div class="fixed inset-0 bg-gradient-to-r from-slate-950/85 via-slate-900/75 to-slate-950/70 z-0"></div>

        <!-- Konten Utama 2 Kolom (Kiri Identitas & Info, Kanan Kartu Login Mengambang) -->
        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 sm:px-10 lg:px-12 pt-8 pb-10 flex-1 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-10">

            <!-- Kolom Kiri: Logo, Judul Portal, Deskripsi & Info Singkat -->
            <div class="w-full lg:w-7/12 text-white flex flex-col justify-between space-y-8">
                <!-- Logo Lepas Tanpa Kotak Putih ala SIMASTER UGM -->
                <div class="space-y-4">
                    <div class="flex items-center">
                        <img
                            src="{{ asset('images/logo-ipwija-header.png') }}"
                            alt="Logo Universitas IPWIJA"
                            class="h-14 sm:h-16 w-auto object-contain drop-shadow-[0_4px_12px_rgba(0,0,0,0.65)]"
                        >
                    </div>

                    <div>
                        <div class="flex flex-wrap items-baseline gap-2">
                            <span class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white">
                                PMB
                            </span>
                            <span class="text-3xl sm:text-4xl font-extrabold tracking-tight text-amber-400">
                                IPWIJA
                            </span>
                        </div>
                        <p class="text-xs sm:text-sm font-medium text-amber-200/95 tracking-wide">
                            Portal Penerimaan Mahasiswa Baru Universitas IPWIJA
                        </p>
                    </div>

                    <!-- Deskripsi Singkat Gaya SIMASTER -->
                    <p class="text-sm sm:text-base text-slate-200 max-w-xl leading-relaxed">
                        Sistem informasi <span class="text-amber-300 font-semibold">Pendaftaran, Seleksi, dan Layanan Calon Mahasiswa Baru</span>, untuk mendukung proses penerimaan mahasiswa yang transparan, cepat, dan terintegrasi di <span class="text-amber-300 font-semibold">Universitas IPWIJA</span>.
                    </p>
                </div>

                <!-- Tombol Akses Cepat / Informasi -->
                <div class="flex flex-wrap items-center gap-3">
                    <a
                        href="#alur-pmb"
                        class="inline-flex items-center gap-2.5 rounded-lg bg-slate-950/90 hover:bg-slate-900 border border-white/25 px-4 py-2.5 text-left transition shadow-md"
                    >
                        <span class="h-8 w-8 rounded-md bg-amber-400/20 text-amber-300 flex items-center justify-center font-bold text-sm">
                            01
                        </span>
                        <div>
                            <span class="block text-[10px] uppercase tracking-wider text-slate-300">Panduan</span>
                            <span class="block text-xs sm:text-sm font-semibold text-white">Alur Pendaftaran</span>
                        </div>
                    </a>

                    <a
                        href="#info-prodi"
                        class="inline-flex items-center gap-2.5 rounded-lg bg-slate-950/90 hover:bg-slate-900 border border-white/25 px-4 py-2.5 text-left transition shadow-md"
                    >
                        <span class="h-8 w-8 rounded-md bg-sky-400/20 text-sky-300 flex items-center justify-center font-bold text-sm">
                            02
                        </span>
                        <div>
                            <span class="block text-[10px] uppercase tracking-wider text-slate-300">Akademik</span>
                            <span class="block text-xs sm:text-sm font-semibold text-white">Program Studi</span>
                        </div>
                    </a>
                </div>

                <!-- Kredit Kecil -->
                <div class="pt-1 text-xs text-slate-300/90">
                    Dibuat dengan <span class="text-rose-400">♥</span> untuk <span class="text-amber-300 font-medium">Universitas IPWIJA</span>
                </div>
            </div>

            <!-- Kolom Kanan: Kartu SIGN IN Mengambang ala SIMASTER -->
            <div class="w-full max-w-md lg:w-[430px] mx-auto lg:mx-0 bg-white rounded-2xl shadow-2xl overflow-hidden border border-slate-100">
                <div class="p-7 sm:p-8">
                    <!-- Header Form -->
                    <div class="text-center mb-6">
                        <h1 class="text-xl font-extrabold tracking-wide text-slate-900 uppercase">
                            SIGN IN
                        </h1>
                        <p class="text-xs text-slate-500 mt-1">
                            Akun PMB Universitas IPWIJA Anda
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mb-4 rounded-lg bg-emerald-50 border border-emerald-200 px-3.5 py-2.5 text-xs text-emerald-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Form Login Utama -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label for="email" class="block text-xs font-semibold text-slate-700 mb-1">
                                Email / Akun Terdaftar
                            </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Masukkan email akun Anda"
                                class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3.5 focus:border-sky-600 focus:ring-sky-600"
                            >
                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-xs font-semibold text-slate-700 mb-1">
                                Kata Sandi
                            </label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan kata sandi"
                                class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3.5 focus:border-sky-600 focus:ring-sky-600"
                            >
                            @error('password')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between text-xs pt-0.5">
                            <label for="remember_me" class="inline-flex items-center gap-2 text-slate-600 cursor-pointer">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="rounded border-slate-300 text-sky-600 focus:ring-sky-600"
                                >
                                <span>Ingat saya</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-slate-600 hover:text-sky-700 font-medium">
                                    Lupa Kata Sandi
                                </a>
                            @endif
                        </div>

                        <!-- Tombol Utama Biru ala SIMASTER -->
                        <button
                            type="submit"
                            class="w-full rounded-lg bg-[#0077b6] hover:bg-[#005f92] text-white font-semibold py-2.5 px-4 text-sm transition shadow-sm cursor-pointer"
                        >
                            Masuk ke Portal PMB
                        </button>

                        <!-- Pemisah "Atau" -->
                        @if (Route::has('register'))
                            <div class="relative py-1 flex items-center justify-center">
                                <div class="border-t border-slate-200 w-full"></div>
                                <span class="bg-white px-3 text-xs text-slate-400">Atau</span>
                                <div class="border-t border-slate-200 w-full"></div>
                            </div>

                            <!-- Tombol Sekunder / Daftar Akun Baru -->
                            <a
                                href="{{ route('register') }}"
                                class="block w-full text-center rounded-lg border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold py-2.5 px-4 text-sm transition"
                            >
                                Registrasi Akun Calon Mahasiswa
                            </a>
                        @endif
                    </form>

                    <!-- 3 Kartu Mini di Bagian Bawah Card ala SIMASTER -->
                    <div id="alur-pmb" class="mt-6 pt-5 border-t border-slate-100 grid grid-cols-3 gap-2.5 text-center">
                        <div class="rounded-xl bg-rose-50/70 p-2.5 border border-rose-100">
                            <div class="mx-auto mb-1.5 h-7 w-7 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center text-xs font-bold">
                                1
                            </div>
                            <p class="text-[11px] font-bold text-slate-800">DAFTAR</p>
                            <p class="text-[10px] text-slate-500 leading-tight mt-0.5">Buat akun &amp; pilih jalur seleksi</p>
                        </div>

                        <div id="info-prodi" class="rounded-xl bg-amber-50/80 p-2.5 border border-amber-100">
                            <div class="mx-auto mb-1.5 h-7 w-7 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-xs font-bold">
                                2
                            </div>
                            <p class="text-[11px] font-bold text-slate-800">BERKAS</p>
                            <p class="text-[10px] text-slate-500 leading-tight mt-0.5">Lengkapi data &amp; unggah dokumen</p>
                        </div>

                        <div class="rounded-xl bg-emerald-50/80 p-2.5 border border-emerald-100">
                            <div class="mx-auto mb-1.5 h-7 w-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">
                                3
                            </div>
                            <p class="text-[11px] font-bold text-slate-800">SELEKSI</p>
                            <p class="text-[10px] text-slate-500 leading-tight mt-0.5">Pantau status &amp; hasil kelulusan</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>