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
                        <div
                            style="width: 50px; height: 50px; padding: 4px; border-radius: 9999px; background: rgba(255, 255, 255, 0.95); display: flex; align-items: center; justify-content: center; flex-shrink: 0; overflow: hidden;"
                        >
                            <img
                                src="{{ asset('images/logo-ipwija-header.png') }}"
                                alt="Logo Universitas IPWIJA"
                                class="h-full w-full object-contain rounded-full"
                                style="width: 100%; height: 100%; object-fit: contain; border-radius: 9999px; display: block;"
                            >
                        </div>
                    </div>

                    <div>
                        <div class="flex flex-wrap items-baseline gap-2.5">
                            <span class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white">
                                PMB
                            </span>
                            <span class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white">
                                IPWIJA
                            </span>
                        </div>
                        <p class="mt-1 text-xs sm:text-sm font-medium text-slate-200 tracking-wide">
                            Portal Penerimaan Mahasiswa Baru Universitas IPWIJA
                        </p>
                    </div>

                    <!-- Deskripsi Singkat Gaya SIMASTER -->
                    <p class="text-sm sm:text-base text-slate-200/95 max-w-xl leading-relaxed">
                        Sistem informasi <span class="text-white font-semibold">Pendaftaran, Seleksi, dan Layanan Calon Mahasiswa Baru</span>, untuk mendukung proses penerimaan mahasiswa yang transparan, cepat, dan terintegrasi di <span class="text-white font-semibold">Universitas IPWIJA</span>.
                    </p>
                </div>

                <!-- Tombol Akses Cepat / Informasi -->
                <div class="flex flex-wrap items-center gap-3">
                    <button
                        type="button"
                        onclick="bukaModalPanduan()"
                        class="inline-flex items-center gap-2.5 rounded-lg bg-slate-950/90 hover:bg-slate-900 border border-white/25 hover:border-amber-300/50 px-4 py-2.5 text-left transition shadow-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-amber-300/60"
                    >
                        <span class="h-8 w-8 rounded-md bg-amber-400/20 text-amber-300 flex items-center justify-center font-bold text-sm">
                            01
                        </span>
                        <div>
                            <span class="block text-[10px] uppercase tracking-wider text-slate-300">Panduan</span>
                            <span class="block text-xs sm:text-sm font-semibold text-white">Alur Pendaftaran</span>
                        </div>
                    </button>

                    <a
                        href="{{ route('program-studi.index') }}"
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
                    Dibuat dengan <span class="text-rose-400">?</span> untuk <span class="text-white font-medium">Universitas IPWIJA</span>
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
                                placeholder="Masukan Email Anda"
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
                                placeholder="Masukan Password Anda"
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

                    <!-- 3 Kartu Mini Interaktif di Bagian Bawah Card ala SIMASTER -->
                    <div id="alur-pmb" class="mt-6 pt-5 border-t border-slate-100 grid grid-cols-3 gap-2.5 text-center">
                        <button
                            type="button"
                            onclick="bukaModalAlur('daftar')"
                            class="group rounded-xl bg-rose-50/70 hover:bg-rose-100/80 hover:-translate-y-0.5 p-2.5 border border-rose-100 hover:border-rose-300 transition duration-200 cursor-pointer text-center focus:outline-none focus:ring-2 focus:ring-rose-300"
                        >
                            <div class="mx-auto mb-1.5 h-7 w-7 rounded-full bg-rose-100 group-hover:bg-rose-200 text-rose-600 flex items-center justify-center text-xs font-bold transition">
                                1
                            </div>
                            <p class="text-[11px] font-bold text-slate-800 group-hover:text-rose-700 transition">DAFTAR</p>
                            <p class="text-[10px] text-slate-500 leading-tight mt-0.5">Buat akun &amp; pilih jalur seleksi</p>
                        </button>

                        <button
                            type="button"
                            onclick="bukaModalAlur('berkas')"
                            class="group rounded-xl bg-amber-50/80 hover:bg-amber-100/80 hover:-translate-y-0.5 p-2.5 border border-amber-100 hover:border-amber-300 transition duration-200 cursor-pointer text-center focus:outline-none focus:ring-2 focus:ring-amber-300"
                        >
                            <div class="mx-auto mb-1.5 h-7 w-7 rounded-full bg-amber-100 group-hover:bg-amber-200 text-amber-600 flex items-center justify-center text-xs font-bold transition">
                                2
                            </div>
                            <p class="text-[11px] font-bold text-slate-800 group-hover:text-amber-700 transition">BERKAS</p>
                            <p class="text-[10px] text-slate-500 leading-tight mt-0.5">Lengkapi data &amp; unggah dokumen</p>
                        </button>

                        <button
                            type="button"
                            onclick="bukaModalAlur('seleksi')"
                            class="group rounded-xl bg-emerald-50/80 hover:bg-emerald-100/80 hover:-translate-y-0.5 p-2.5 border border-emerald-100 hover:border-emerald-300 transition duration-200 cursor-pointer text-center focus:outline-none focus:ring-2 focus:ring-emerald-300"
                        >
                            <div class="mx-auto mb-1.5 h-7 w-7 rounded-full bg-emerald-100 group-hover:bg-emerald-200 text-emerald-600 flex items-center justify-center text-xs font-bold transition">
                                3
                            </div>
                            <p class="text-[11px] font-bold text-slate-800 group-hover:text-emerald-700 transition">SELEKSI</p>
                            <p class="text-[10px] text-slate-500 leading-tight mt-0.5">Pantau status &amp; hasil kelulusan</p>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Panduan Alur Pendaftaran PMB -->
    <div
        id="modalPanduanPmb"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modalPanduanJudul"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/75 backdrop-blur-[2px] p-4 opacity-0 transition-opacity duration-200"
        onclick="tutupModalPanduanBackdrop(event)"
    >
        <div
            id="modalPanduanPanel"
            class="w-full max-w-lg max-h-[90vh] flex flex-col rounded-2xl bg-white shadow-2xl border border-slate-100 overflow-hidden transform scale-95 opacity-0 transition-all duration-200"
        >
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-slate-50/60 shrink-0">
                <div class="flex items-center gap-3">
                    <span class="h-8 w-8 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center text-xs font-extrabold">
                        01
                    </span>
                    <div>
                        <h2 id="modalPanduanJudul" class="text-sm font-extrabold text-slate-900 uppercase tracking-wide">
                            Panduan Alur Pendaftaran PMB
                        </h2>
                        <p class="text-xs text-slate-500">
                            Alur penerimaan calon mahasiswa baru Universitas IPWIJA
                        </p>
                    </div>
                </div>
                <button
                    type="button"
                    onclick="tutupModalPanduan()"
                    class="rounded-lg p-1.5 text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition cursor-pointer"
                    aria-label="Tutup panduan"
                >
                    ?
                </button>
            </div>

            <div class="p-6 space-y-4 text-xs sm:text-sm text-slate-600 overflow-y-auto">
                <p class="leading-relaxed">
                    Pendaftaran calon mahasiswa baru dilakukan secara daring melalui portal PMB dengan tiga langkah utama:
                </p>

                <div class="space-y-2.5">
                    <div class="flex items-start gap-3 rounded-xl bg-rose-50/60 border border-rose-100 p-3">
                        <span class="mt-0.5 h-6 w-6 shrink-0 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center text-xs font-extrabold">
                            1
                        </span>
                        <div>
                            <p class="text-xs font-bold text-slate-900 uppercase">Daftar &amp; Pilih Jalur / Program Studi</p>
                            <p class="text-xs text-slate-600 mt-0.5 leading-relaxed">
                                Cek program studi tujuan, buat akun PMB, lalu pilih jalur masuk sesuai kebutuhan.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 rounded-xl bg-amber-50/70 border border-amber-100 p-3">
                        <span class="mt-0.5 h-6 w-6 shrink-0 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-xs font-extrabold">
                            2
                        </span>
                        <div>
                            <p class="text-xs font-bold text-slate-900 uppercase">Lengkapi Data &amp; Unggah Berkas</p>
                            <p class="text-xs text-slate-600 mt-0.5 leading-relaxed">
                                Isi biodata calon mahasiswa dan unggah dokumen persyaratan setelah akun aktif.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 rounded-xl bg-emerald-50/70 border border-emerald-100 p-3">
                        <span class="mt-0.5 h-6 w-6 shrink-0 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-extrabold">
                            3
                        </span>
                        <div>
                            <p class="text-xs font-bold text-slate-900 uppercase">Verifikasi, Seleksi &amp; Pengumuman</p>
                            <p class="text-xs text-slate-600 mt-0.5 leading-relaxed">
                                Pantau status verifikasi berkas, tahapan seleksi, dan hasil kelulusan lewat akun Anda.
                            </p>
                        </div>
                    </div>
                </div>

                <p class="text-[11px] text-slate-500 leading-relaxed">
                    Pastikan data sesuai dokumen resmi dan simpan kredensial akun untuk memantau status pendaftaran.
                </p>
            </div>

            <div class="px-6 py-4 bg-slate-50/80 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3 shrink-0">
                <button
                    type="button"
                    onclick="tutupModalPanduan()"
                    class="rounded-lg border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 font-semibold px-4 py-2 text-xs transition cursor-pointer"
                >
                    Tutup
                </button>

                <div class="flex flex-wrap items-center gap-2.5">
                    <a
                        href="{{ route('program-studi.index') }}"
                        class="rounded-lg border border-sky-200 bg-sky-50 hover:bg-sky-100 text-sky-800 font-semibold px-4 py-2 text-xs transition"
                    >
                        Lihat Program Studi
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-lg bg-[#0077b6] hover:bg-[#005f92] text-white font-semibold px-4 py-2 text-xs transition"
                        >
                            Daftar Akun Baru
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Informasi Alur PMB (Tahap 1 - 3) -->
    <div
        id="modalAlurPmb"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modalAlurJudul"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/70 backdrop-blur-[2px] p-4 opacity-0 transition-opacity duration-200"
        onclick="tutupModalAlurBackdrop(event)"
    >
        <div
            id="modalAlurPanel"
            class="w-full max-w-md max-h-[90vh] flex flex-col rounded-2xl bg-white shadow-2xl border border-slate-100 overflow-hidden transform scale-95 opacity-0 transition-all duration-200"
        >
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 shrink-0">
                <div class="flex items-center gap-3">
                    <span
                        id="modalAlurBadge"
                        class="h-8 w-8 rounded-full flex items-center justify-center text-xs font-extrabold"
                    >
                        1
                    </span>
                    <div>
                        <h2 id="modalAlurJudul" class="text-sm font-extrabold text-slate-900 uppercase tracking-wide">
                            DAFTAR
                        </h2>
                        <p id="modalAlurSubjudul" class="text-xs text-slate-500">
                            Buat akun &amp; pilih jalur seleksi
                        </p>
                    </div>
                </div>
                <button
                    type="button"
                    onclick="tutupModalAlur()"
                    class="rounded-lg p-1.5 text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition cursor-pointer"
                    aria-label="Tutup modal"
                >
                    ?
                </button>
            </div>

            <div class="p-6 space-y-4 text-xs sm:text-sm text-slate-600 overflow-y-auto">
                <p id="modalAlurDeskripsi" class="leading-relaxed"></p>
                <ul
                    id="modalAlurPoin"
                    class="space-y-2 text-xs text-slate-700 bg-slate-50 rounded-xl p-4 pl-8 border border-slate-100 list-disc"
                ></ul>
            </div>

            <div class="px-6 py-4 bg-slate-50/70 border-t border-slate-100 flex flex-wrap items-center justify-end gap-2.5 shrink-0">
                <button
                    type="button"
                    onclick="tutupModalAlur()"
                    class="rounded-lg border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 font-semibold px-4 py-2 text-xs transition cursor-pointer"
                >
                    Tutup
                </button>

                @if (Route::has('register'))
                    <a
                        id="modalAlurAksi"
                        href="{{ route('register') }}"
                        class="rounded-lg bg-[#0077b6] hover:bg-[#005f92] text-white font-semibold px-4 py-2 text-xs transition"
                    >
                        Mulai Daftar Akun
                    </a>
                @endif
            </div>
        </div>
    </div>

    <script>
        const dataAlurPmb = {
            daftar: {
                nomor: '1',
                badgeClass: 'bg-rose-100 text-rose-600',
                bulletClass: 'marker:text-rose-500',
                judul: 'Tahap 1 · DAFTAR',
                subjudul: 'Buat akun & pilih jalur seleksi',
                deskripsi: 'Langkah awal calon mahasiswa baru adalah membuat akun pendaftaran PMB Universitas IPWIJA, meninjau pilihan program studi, lalu menentukan jalur seleksi/gelombang yang sesuai.',
                poin: [
                    'Siapkan email aktif dan data diri dasar untuk registrasi akun.',
                    'Cek pilihan program studi sebelum menentukan jalur pendaftaran.',
                    'Simpan kredensial akun untuk masuk kembali ke portal PMB.'
                ],
                aksiText: 'Registrasi Akun Baru',
                aksiHref: @json(Route::has('register') ? route('register') : route('program-studi.index')),
                fokusEmail: false
            },
            berkas: {
                nomor: '2',
                badgeClass: 'bg-amber-100 text-amber-600',
                bulletClass: 'marker:text-amber-500',
                judul: 'Tahap 2 · BERKAS',
                subjudul: 'Lengkapi data & unggah dokumen',
                deskripsi: 'Setelah akun aktif, lengkapi formulir biodata calon mahasiswa serta unggah dokumen persyaratan sesuai ketentuan jalur pendaftaran.',
                poin: [
                    'Lengkapi data pribadi, alamat, dan informasi pendukung.',
                    'Unggah dokumen persyaratan dalam format yang jelas dan terbaca.',
                    'Pastikan seluruh isian sudah diperiksa sebelum dikirim untuk diverifikasi.'
                ],
                aksiText: 'Lanjut ke Form Login',
                aksiHref: '#email',
                fokusEmail: true
            },
            seleksi: {
                nomor: '3',
                badgeClass: 'bg-emerald-100 text-emerald-600',
                bulletClass: 'marker:text-emerald-500',
                judul: 'Tahap 3 · SELEKSI',
                subjudul: 'Pantau status & hasil kelulusan',
                deskripsi: 'Berkas dan pendaftaran yang masuk akan melalui proses verifikasi serta seleksi. Kamu bisa memantau perkembangan status pendaftaran secara berkala.',
                poin: [
                    'Masuk menggunakan akun terdaftar untuk melihat status verifikasi/seleksi.',
                    'Ikuti tahapan atau jadwal lanjutan bila diperlukan oleh jalur seleksi.',
                    'Pantau pengumuman hasil kelulusan langsung melalui akun PMB.'
                ],
                aksiText: 'Cek Akun / Login',
                aksiHref: '#email',
                fokusEmail: true
            }
        };

        let tutupAlurTimer = null;
        let tutupPanduanTimer = null;

        function bukaModalPanduan() {
            if (tutupPanduanTimer) {
                clearTimeout(tutupPanduanTimer);
                tutupPanduanTimer = null;
            }

            const modal = document.getElementById('modalPanduanPmb');
            const panel = document.getElementById('modalPanduanPanel');
            if (!modal || !panel) return;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
                panel.classList.remove('scale-95', 'opacity-0');
                panel.classList.add('scale-100', 'opacity-100');
            });
        }

        function tutupModalPanduan() {
            const modal = document.getElementById('modalPanduanPmb');
            const panel = document.getElementById('modalPanduanPanel');
            if (!modal || !panel) return;

            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            panel.classList.remove('scale-100', 'opacity-100');
            panel.classList.add('scale-95', 'opacity-0');

            tutupPanduanTimer = setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 200);
        }

        function tutupModalPanduanBackdrop(event) {
            if (event.target.id === 'modalPanduanPmb') {
                tutupModalPanduan();
            }
        }

        function bukaModalAlur(tahap) {
            const item = dataAlurPmb[tahap];
            if (!item) return;

            if (tutupAlurTimer) {
                clearTimeout(tutupAlurTimer);
                tutupAlurTimer = null;
            }

            const modal = document.getElementById('modalAlurPmb');
            const panel = document.getElementById('modalAlurPanel');
            const badge = document.getElementById('modalAlurBadge');
            const judul = document.getElementById('modalAlurJudul');
            const subjudul = document.getElementById('modalAlurSubjudul');
            const deskripsi = document.getElementById('modalAlurDeskripsi');
            const listPoin = document.getElementById('modalAlurPoin');
            const aksi = document.getElementById('modalAlurAksi');

            badge.textContent = item.nomor;
            badge.className = `h-8 w-8 rounded-full flex items-center justify-center text-xs font-extrabold ${item.badgeClass}`;
            judul.textContent = item.judul;
            subjudul.textContent = item.subjudul;
            deskripsi.textContent = item.deskripsi;

            listPoin.className = `space-y-2 text-xs text-slate-700 bg-slate-50 rounded-xl p-4 pl-8 border border-slate-100 list-disc ${item.bulletClass}`;
            listPoin.innerHTML = item.poin
                .map((teks) => `<li class="leading-relaxed">${teks}</li>`)
                .join('');

            if (aksi) {
                aksi.textContent = item.aksiText;
                aksi.setAttribute('href', item.aksiHref);
                aksi.onclick = function (event) {
                    if (item.fokusEmail) {
                        event.preventDefault();
                        tutupModalAlur();
                        setTimeout(() => {
                            const emailInput = document.getElementById('email');
                            if (emailInput) {
                                emailInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                emailInput.focus();
                            }
                        }, 180);
                    } else {
                        tutupModalAlur();
                    }
                };
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
                panel.classList.remove('scale-95', 'opacity-0');
                panel.classList.add('scale-100', 'opacity-100');
            });
        }

        function tutupModalAlur() {
            const modal = document.getElementById('modalAlurPmb');
            const panel = document.getElementById('modalAlurPanel');
            if (!modal || !panel) return;

            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            panel.classList.remove('scale-100', 'opacity-100');
            panel.classList.add('scale-95', 'opacity-0');

            tutupAlurTimer = setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 200);
        }

        function tutupModalAlurBackdrop(event) {
            if (event.target.id === 'modalAlurPmb') {
                tutupModalAlur();
            }
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                tutupModalPanduan();
                tutupModalAlur();
            }
        });
    </script>
</body>
</html>

