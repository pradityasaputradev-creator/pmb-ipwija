<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jalur Pendaftaran - PMB Universitas IPWIJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f4f6f9] text-slate-800 antialiased">
    @php
        $daftarJalur = [
            [
                'kode' => 'ganjil-2026-malam-gel-3-a',
                'status' => 'Dibuka',
                'judul' => 'PMB GANJIL 2026/2027 - REGULER (KELAS MALAM) GELOMBANG 3',
                'jenjang' => 'S1',
                'prodi' => 'S1 - Informatika',
                'sistem' => 'Reguler Malam',
                'jadwal' => 'Perkuliahan : Selasa & Kamis : 17.00 - 22.00 WIB (Menyesuaikan Jadwal Perkuliahan)',
                'detail_jadwal' => 'Selasa: 17.00 - 19.30 WIB • Kamis: 17.00 - 19.30 WIB',
                'kelas' => 'KELAS A',
                'periode' => '1 Agu 2026 - 24 Des 2026',
                'biaya' => 'Gratis',
            ],
            [
                'kode' => 'ganjil-2026-malam-gel-3-b',
                'status' => 'Dibuka',
                'judul' => 'PMB GANJIL 2026/2027 - REGULER (KELAS MALAM) GELOMBANG 3',
                'jenjang' => 'S1',
                'prodi' => 'S1 - Manajemen',
                'sistem' => 'Reguler Malam',
                'jadwal' => 'Perkuliahan : Senin - Kamis : 17.00 - 22.00 WIB (Menyesuaikan Jadwal Perkuliahan)',
                'detail_jadwal' => 'Senin - Kamis: 17.00 - 19.30 WIB',
                'kelas' => 'KELAS B',
                'periode' => '1 Agu 2026 - 24 Des 2026',
                'biaya' => 'Rp 250.000',
            ],
            [
                'kode' => 'ganjil-2026-pagi-gel-3',
                'status' => 'Dibuka',
                'judul' => 'PMB GANJIL 2026/2027 - REGULER PAGI GELOMBANG 3',
                'jenjang' => 'D3',
                'prodi' => 'D3 - Kebidanan',
                'sistem' => 'Reguler Pagi',
                'jadwal' => 'Perkuliahan : Senin - Jumat : 08.00 - 15.00 WIB (Menyesuaikan Jadwal Perkuliahan)',
                'detail_jadwal' => 'Senin - Jumat: 08.00 - 12.00 WIB',
                'kelas' => 'KELAS PAGI',
                'periode' => '1 Agu 2026 - 24 Des 2026',
                'biaya' => 'Gratis',
            ],
        ];
    @endphp

    <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            <a href="{{ route('login') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo-ipwija-header.png') }}" alt="Logo Universitas IPWIJA" class="h-10 w-10 object-contain">
                <div>
                    <span class="block text-[11px] text-slate-500 leading-tight">Penerimaan Mahasiswa Baru</span>
                    <span class="block text-sm sm:text-base font-extrabold text-slate-900 leading-tight">Universitas IPWIJA</span>
                </div>
            </a>
            <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-slate-600">
                <a href="{{ route('login') }}" class="hover:text-[#0b4f8a] transition">Beranda</a>
                <a href="{{ route('jalur-pendaftaran.index') }}" class="text-[#0b4f8a] font-bold border-b-2 border-[#0b4f8a] py-5">Jalur Pendaftaran</a>
                <a href="{{ route('program-studi.index') }}" class="hover:text-[#0b4f8a] transition">Program Studi</a>
                <a href="#tata-cara" class="hover:text-[#0b4f8a] transition">Informasi</a>
            </nav>
            <div class="flex items-center gap-2.5">
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-lg bg-[#0b4f8a] hover:bg-[#083b69] px-4 py-2 text-xs sm:text-sm font-semibold text-white transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg border border-[#0b4f8a] text-[#0b4f8a] hover:bg-[#0b4f8a] hover:text-white px-4 py-1.5 text-xs sm:text-sm font-semibold transition">Masuk</a>
                @endauth
            </div>
        </div>
    </header>

    <section class="relative bg-gradient-to-r from-[#083b69] via-[#0b4f8a] to-[#1366b0] text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-20">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-widest text-sky-200 font-semibold">Portal Akademik PMB</p>
                    <h1 class="mt-1 text-2xl sm:text-3xl font-extrabold tracking-tight">Jalur Pendaftaran Mahasiswa Baru</h1>
                    <p class="mt-1 text-xs sm:text-sm text-sky-100/90">Universitas IPWIJA &bull; Tahun Akademik 2026/2027</p>
                </div>
                <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 self-start sm:self-auto rounded-lg bg-white/15 hover:bg-white/25 border border-white/25 px-3.5 py-2 text-xs font-semibold text-white transition">&larr; Kembali ke Halaman Masuk</a>
            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 pb-14 space-y-6 relative z-10">
        <div id="cari-jalur" class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 sm:p-6">
            <h2 class="text-base sm:text-lg font-extrabold text-slate-900">Jalur Pendaftaran</h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Temukan jalur pendaftaran sesuai dengan pilihan program studi yang diminati.</p>
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <select id="filter-jenjang" class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 text-slate-700 focus:border-[#0b4f8a] focus:ring-[#0b4f8a]">
                    <option value="">-- Pilih Jenjang --</option>
                    <option value="D3">D3 - Diploma 3</option>
                    <option value="S1">S1 - Strata 1</option>
                    <option value="S2">S2 - Pascasarjana</option>
                </select>
                <select id="filter-prodi" class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 text-slate-700 focus:border-[#0b4f8a] focus:ring-[#0b4f8a]">
                    <option value="">-- Pilih Program Studi --</option>
                    <option value="D3 - Kebidanan">D3 - Kebidanan</option>
                    <option value="S1 - Informatika">S1 - Informatika</option>
                    <option value="S1 - Manajemen">S1 - Manajemen</option>
                    <option value="S1 - Akuntansi">S1 - Akuntansi</option>
                </select>
                <select id="filter-sistem" class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 text-slate-700 focus:border-[#0b4f8a] focus:ring-[#0b4f8a]">
                    <option value="">-- Pilih Sistem Kuliah --</option>
                    <option value="Reguler Pagi">Reguler Pagi</option>
                    <option value="Reguler Malam">Reguler Malam</option>
                    <option value="Kelas Karyawan">Kelas Karyawan</option>
                </select>
                <button type="button" onclick="terapkanFilterJalur()" class="w-full rounded-lg bg-[#1d4ed8] hover:bg-[#1e40af] text-white font-semibold py-2.5 px-4 text-sm transition shadow-xs cursor-pointer">Cari Jalur Pendaftaran</button>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
            <button type="button" onclick="toggleTataCara()" class="w-full px-5 sm:px-6 py-4 flex items-center justify-between text-left text-sm font-extrabold text-slate-900 hover:bg-slate-50/70 transition cursor-pointer">
                <span>Tata Cara Pendaftaran Mahasiswa Baru</span>
                <span id="icon-tata-cara" class="text-slate-500 text-lg leading-none">+</span>
            </button>
            <div id="panel-tata-cara" class="hidden px-5 sm:px-6 pb-5 pt-2 border-t border-slate-100 text-xs sm:text-sm text-slate-600 space-y-2">
                <p><strong class="text-slate-800">1. Pilih Gelombang / Jalur:</strong> Sesuaikan jadwal perkuliahan, sistem kuliah, dan biaya pendaftaran.</p>
                <p><strong class="text-slate-800">2. Klik Daftar Sekarang:</strong> Buat akun calon mahasiswa baru dan lengkapi data pendaftaran.</p>
                <p><strong class="text-slate-800">3. Unggah Berkas &amp; Seleksi:</strong> Ikuti tahapan administrasi serta pantau status melalui dashboard PMB.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            <div class="lg:col-span-8 space-y-4">
                <div class="flex flex-wrap items-center justify-between gap-2 px-1">
                    <h2 class="text-base sm:text-lg font-extrabold text-slate-900">Gelombang Pendaftaran Aktif</h2>
                    <button type="button" onclick="resetFilterJalur()" class="text-xs font-semibold text-[#0b4f8a] hover:underline cursor-pointer">Tampilkan Semua</button>
                </div>

                <div id="daftar-kartu-jalur" class="space-y-4">
                    @foreach ($daftarJalur as $jalur)
                        <div class="kartu-jalur bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 sm:p-6 flex flex-col md:flex-row md:items-center justify-between gap-5 hover:border-[#0b4f8a]/50 transition" data-jenjang="{{ $jalur['jenjang'] }}" data-prodi="{{ $jalur['prodi'] }}" data-sistem="{{ $jalur['sistem'] }}">
                            <div class="space-y-2 min-w-0 flex-1">
                                <span class="inline-flex items-center rounded-md bg-emerald-100 px-2.5 py-0.5 text-xs font-bold text-emerald-700">{{ $jalur['status'] }}</span>
                                <h3 class="text-sm sm:text-base font-extrabold text-slate-900 leading-snug">{{ $jalur['judul'] }}</h3>
                                <p class="text-xs sm:text-sm text-slate-600">{{ $jalur['jadwal'] }}</p>
                                <p class="text-xs text-slate-500">{{ $jalur['detail_jadwal'] }} &bull; <span class="font-semibold text-slate-700">{{ $jalur['prodi'] }}</span></p>
                                <div class="pt-1">
                                    <span class="inline-block rounded-md bg-slate-100 border border-slate-200/80 px-2.5 py-1 text-[11px] font-bold tracking-wider text-slate-700 uppercase">{{ $jalur['kelas'] }}</span>
                                </div>
                            </div>
                            <div class="md:w-56 shrink-0 flex flex-col justify-between gap-3 md:border-l md:border-slate-100 md:pl-5 pt-3 md:pt-0 border-t md:border-t-0">
                                <div class="space-y-1.5 text-xs text-slate-600">
                                    <div class="flex items-center gap-2"><span class="text-slate-400 font-semibold">Periode:</span><span class="font-semibold text-slate-700">{{ $jalur['periode'] }}</span></div>
                                    <div class="flex items-center gap-2"><span class="text-slate-400 font-semibold">Biaya Daftar:</span><span class="font-extrabold {{ $jalur['biaya'] === 'Gratis' ? 'text-emerald-600' : 'text-slate-800' }}">{{ $jalur['biaya'] }}</span></div>
                                </div>
                                <a href="{{ route('register', ['jalur' => $jalur['kode'], 'prodi' => $jalur['prodi'], 'sistem' => $jalur['sistem']]) }}" class="w-full inline-flex items-center justify-center rounded-lg bg-[#0b4f8a] hover:bg-[#083b69] text-white font-semibold py-2.5 px-4 text-xs sm:text-sm transition">Daftar Sekarang</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="pesan-kosong-jalur" class="hidden rounded-2xl bg-white border border-slate-200/80 p-6 text-center text-xs sm:text-sm text-slate-500">Tidak ada jalur pendaftaran yang sesuai dengan kriteria pencarian. Silakan ubah filter atau klik <strong>Tampilkan Semua</strong>.</div>
            </div>

            <div class="lg:col-span-4 space-y-5">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 sm:p-6">
                    <h3 class="text-base font-extrabold text-slate-900">Brosur Dan Informasi Biaya</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1.5 leading-relaxed">Brosur dan rincian biaya selama kuliah di Universitas IPWIJA Tahun Akademik 2026/2027.</p>
                    <button type="button" onclick="bukaModalBiaya()" class="mt-4 inline-flex items-center justify-center rounded-lg border border-[#0b4f8a] text-[#0b4f8a] hover:bg-[#0b4f8a] hover:text-white px-4 py-2 text-xs font-semibold transition cursor-pointer">Lihat Detail</button>
                </div>
                <div id="tata-cara" class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 sm:p-6">
                    <h3 class="text-base font-extrabold text-slate-900">Informasi Program Studi</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1.5 leading-relaxed">Cek daftar jurusan, akreditasi, dan pilihan sistem kuliah sebelum menentukan jalur pendaftaran.</p>
                    <a href="{{ route('program-studi.index') }}" class="mt-4 block w-full text-center rounded-lg border border-[#0b4f8a] text-[#0b4f8a] hover:bg-[#0b4f8a] hover:text-white font-semibold py-2 px-4 text-xs sm:text-sm transition">Lihat Program Studi</a>
                </div>
            </div>
        </div>
    </main>

    <div id="modal-detail-jalur" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/70 p-4 backdrop-blur-2xs" onclick="if (event.target === this) tutupModalBiaya()">
        <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-2xl border border-slate-200">
            <div class="flex items-start justify-between gap-3 border-b border-slate-100 pb-3.5">
                <div>
                    <span class="inline-block rounded-md bg-sky-100 px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider text-[#0b4f8a]">Informasi Biaya &amp; Brosur</span>
                    <h3 class="mt-1 text-lg font-extrabold text-slate-900">Rincian Biaya Kuliah Universitas IPWIJA</h3>
                </div>
                <button type="button" onclick="tutupModalBiaya()" class="rounded-lg px-2 py-1 text-sm font-bold text-slate-400 hover:bg-slate-100 hover:text-slate-700 cursor-pointer">&times;</button>
            </div>
            <div class="mt-4 space-y-3 text-xs sm:text-sm text-slate-600 leading-relaxed">
                <p>Universitas IPWIJA menyediakan skema biaya pendidikan yang terjangkau sesuai gelombang pendaftaran aktif:</p>
                <ul class="list-disc pl-5 space-y-1 text-xs">
                    <li><strong>Biaya Pendaftaran:</strong> Gratis pada gelombang promosi tertentu atau sesuai ketentuan jalur.</li>
                    <li><strong>Dana Pengembangan &amp; SPP:</strong> Tersedia opsi angsuran untuk kelas Reguler maupun Kelas Karyawan.</li>
                    <li><strong>Beasiswa:</strong> Tersedia jalur Beasiswa Prestasi Akademik, Non-Akademik, dan KIP-Kuliah.</li>
                </ul>
            </div>
            <div class="mt-6 flex flex-wrap items-center justify-end gap-2.5 border-t border-slate-100 pt-4">
                <a href="{{ route('register') }}" class="rounded-lg bg-[#0b4f8a] hover:bg-[#083b69] px-4 py-2 text-xs font-semibold text-white transition">Daftar Sekarang</a>
                <button type="button" onclick="tutupModalBiaya()" class="rounded-lg border border-slate-200 bg-white hover:bg-slate-50 px-4 py-2 text-xs font-semibold text-slate-700 transition cursor-pointer">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        function terapkanFilterJalur() {
            const jenjang = document.getElementById('filter-jenjang').value;
            const prodi = document.getElementById('filter-prodi').value;
            const sistem = document.getElementById('filter-sistem').value;
            let tampil = 0;
            document.querySelectorAll('.kartu-jalur').forEach(kartu => {
                const cocok = (!jenjang || kartu.dataset.jenjang === jenjang) && (!prodi || kartu.dataset.prodi === prodi) && (!sistem || kartu.dataset.sistem === sistem);
                kartu.classList.toggle('hidden', !cocok);
                if (cocok) tampil++;
            });
            document.getElementById('pesan-kosong-jalur').classList.toggle('hidden', tampil > 0);
        }
        function resetFilterJalur() {
            document.getElementById('filter-jenjang').value = '';
            document.getElementById('filter-prodi').value = '';
            document.getElementById('filter-sistem').value = '';
            terapkanFilterJalur();
        }
        function toggleTataCara() {
            const panel = document.getElementById('panel-tata-cara');
            const icon = document.getElementById('icon-tata-cara');
            icon.textContent = panel.classList.toggle('hidden') ? '+' : '−';
        }
        function bukaModalBiaya() {
            const modal = document.getElementById('modal-detail-jalur');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function tutupModalBiaya() {
            const modal = document.getElementById('modal-detail-jalur');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</body>
</html>
