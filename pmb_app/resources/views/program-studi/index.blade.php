<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Studi - PMB Universitas IPWIJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f4f6f9] text-slate-800 antialiased">
    @php
        $daftarProdi = [
            ['jenjang' => 'D3', 'label_jenjang' => 'D3 - Diploma 3', 'fakultas' => 'Fakultas Ilmu Kesehatan', 'nama' => 'D3 - Kebidanan', 'jalur' => 'Tersedia 1 Jalur Pendaftaran', 'sistem' => ['Reguler Pagi', 'Kelas Karyawan'], 'akreditasi' => 'Baik Sekali', 'deskripsi' => 'Program vokasi kebidanan yang berfokus pada praktik klinik, pelayanan kesehatan ibu dan anak, serta kesiapan kerja profesional.'],
            ['jenjang' => 'S1', 'label_jenjang' => 'S1 - Strata 1', 'fakultas' => 'Fakultas Teknologi Informasi', 'nama' => 'S1 - Informatika', 'jalur' => 'Tersedia 3 Jalur Pendaftaran', 'sistem' => ['Reguler Pagi', 'Reguler Malam', 'Kelas Karyawan'], 'akreditasi' => 'Baik Sekali', 'deskripsi' => 'Mempelajari rekayasa perangkat lunak, kecerdasan buatan, pengembangan aplikasi web & mobile, serta keamanan siber.'],
            ['jenjang' => 'S1', 'label_jenjang' => 'S1 - Strata 1', 'fakultas' => 'Fakultas Ekonomi dan Bisnis', 'nama' => 'S1 - Kewirausahaan', 'jalur' => 'Tersedia 3 Jalur Pendaftaran', 'sistem' => ['Reguler Pagi', 'Reguler Malam', 'Kelas Karyawan'], 'akreditasi' => 'Baik Sekali', 'deskripsi' => 'Mencetak wirausaha muda kreatif dengan kurikulum berbasis inkubasi bisnis, digital marketing, dan manajemen startup.'],
            ['jenjang' => 'S1', 'label_jenjang' => 'S1 - Strata 1', 'fakultas' => 'Fakultas Ekonomi dan Bisnis', 'nama' => 'S1 - Manajemen', 'jalur' => 'Tersedia 3 Jalur Pendaftaran', 'sistem' => ['Reguler Pagi', 'Reguler Malam', 'Kelas Karyawan'], 'akreditasi' => 'Baik Sekali', 'deskripsi' => 'Fokus pada manajemen bisnis modern, keuangan, pemasaran, dan sumber daya manusia berbasis analisis data.'],
            ['jenjang' => 'S1', 'label_jenjang' => 'S1 - Strata 1', 'fakultas' => 'Fakultas Ekonomi dan Bisnis', 'nama' => 'S1 - Akuntansi', 'jalur' => 'Tersedia 2 Jalur Pendaftaran', 'sistem' => ['Reguler Pagi', 'Kelas Karyawan'], 'akreditasi' => 'Baik', 'deskripsi' => 'Membekali mahasiswa dengan kompetensi audit, perpajakan, akuntansi sektor publik, dan sistem informasi akuntansi.'],
            ['jenjang' => 'S2', 'label_jenjang' => 'S2 - Pascasarjana', 'fakultas' => 'Program Pascasarjana', 'nama' => 'S2 - Magister Manajemen', 'jalur' => 'Tersedia 2 Jalur Pendaftaran', 'sistem' => ['Reguler Akhir Pekan', 'Kelas Eksekutif'], 'akreditasi' => 'Baik Sekali', 'deskripsi' => 'Program pascasarjana bagi profesional dan pemimpin organisasi untuk memperkuat strategi bisnis dan kepemimpinan.'],
        ];
    @endphp

    <!-- Navbar Publik Atas -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            <a href="{{ route('login') }}" class="flex items-center gap-3">
                <img
                    src="{{ asset('images/logo-ipwija-header.png') }}"
                    alt="Logo Universitas IPWIJA"
                    class="h-10 w-10 object-contain"
                >
                <div>
                    <span class="block text-[11px] text-slate-500 leading-tight">Penerimaan Mahasiswa Baru</span>
                    <span class="block text-sm sm:text-base font-extrabold text-slate-900 leading-tight">Universitas IPWIJA</span>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-7 text-sm font-medium text-slate-600">
                <a href="{{ route('login') }}" class="hover:text-[#0b4f8a] transition">Beranda</a>
                <a href="{{ route('jalur-pendaftaran.index') }}" class="hover:text-[#0b4f8a] transition">Jalur Pendaftaran</a>
                <a href="{{ route('program-studi.index') }}" class="text-[#0b4f8a] font-bold border-b-2 border-[#0b4f8a] py-5">Program Studi</a>
                <a href="#tata-cara" class="hover:text-[#0b4f8a] transition">Informasi</a>
            </nav>

            <div class="flex items-center gap-2.5">
                @auth
                    <a
                        href="{{ route('dashboard') }}"
                        class="rounded-lg bg-[#0b4f8a] hover:bg-[#083b69] px-4 py-2 text-xs sm:text-sm font-semibold text-white transition"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-lg border border-[#0b4f8a] text-[#0b4f8a] hover:bg-[#0b4f8a] hover:text-white px-4 py-1.5 text-xs sm:text-sm font-semibold transition"
                    >
                        Masuk
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Banner Header Atas -->
    <section class="relative bg-gradient-to-r from-[#083b69] via-[#0b4f8a] to-[#1366b0] text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-20">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-widest text-sky-200 font-semibold">Portal Akademik PMB</p>
                    <h1 class="mt-1 text-2xl sm:text-3xl font-extrabold tracking-tight">Informasi Program Studi &amp; Jalur Pendaftaran</h1>
                    <p class="mt-1 text-xs sm:text-sm text-sky-100/90">Universitas IPWIJA &bull; Tahun Akademik 2026/2027</p>
                </div>
                <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center gap-1.5 self-start sm:self-auto rounded-lg bg-white/15 hover:bg-white/25 border border-white/25 px-3.5 py-2 text-xs font-semibold text-white transition"
                >
                    &larr; Kembali ke Halaman Masuk
                </a>
            </div>
        </div>
    </section>

    <!-- Konten Utama -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 pb-14 space-y-6 relative z-10">

        <!-- Kartu Filter: Cari Jalur Pendaftaran -->
        <div id="cari-jalur" class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 sm:p-6">
            <h2 class="text-base sm:text-lg font-extrabold text-slate-900">Cari Jalur Pendaftaran</h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Temukan jalur pendaftaran sesuai dengan pilihan program studi yang diminati.</p>

            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <div>
                    <select id="filter-jenjang" class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 text-slate-700 focus:border-[#0b4f8a] focus:ring-[#0b4f8a]">
                        <option value="">-- Pilih Jenjang --</option>
                        <option value="D3">D3 - Diploma 3</option>
                        <option value="S1">S1 - Strata 1</option>
                        <option value="S2">S2 - Pascasarjana</option>
                    </select>
                </div>

                <div>
                    <select id="filter-prodi" class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 text-slate-700 focus:border-[#0b4f8a] focus:ring-[#0b4f8a]">
                        <option value="">-- Pilih Program Studi --</option>
                        @foreach ($daftarProdi as $item)
                            <option value="{{ $item['nama'] }}">{{ $item['nama'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <select id="filter-sistem" class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 text-slate-700 focus:border-[#0b4f8a] focus:ring-[#0b4f8a]">
                        <option value="">-- Pilih Sistem Kuliah --</option>
                        <option value="Reguler Pagi">Reguler Pagi</option>
                        <option value="Reguler Malam">Reguler Malam</option>
                        <option value="Kelas Karyawan">Kelas Karyawan</option>
                        <option value="Kelas Eksekutif">Kelas Eksekutif</option>
                    </select>
                </div>

                <div>
                    <button
                        type="button"
                        onclick="terapkanFilterProdi()"
                        class="w-full rounded-lg bg-[#1d4ed8] hover:bg-[#1e40af] text-white font-semibold py-2.5 px-4 text-sm transition shadow-xs cursor-pointer"
                    >
                        Cari Jalur Pendaftaran
                    </button>
                </div>
            </div>
        </div>

        <!-- Grid 2 Kolom: Kiri Informasi Program Studi, Kanan Brosur & Tata Cara -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- Kolom Kiri (8 kolom) -->
            <div class="lg:col-span-8 bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 sm:p-6">
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <h2 class="text-base sm:text-lg font-extrabold text-slate-900">Informasi Program Studi</h2>
                    <button
                        type="button"
                        onclick="resetFilterProdi()"
                        class="text-xs font-semibold text-[#0b4f8a] hover:underline cursor-pointer"
                    >
                        Tampilkan Semua
                    </button>
                </div>

                <!-- Tab Jenjang -->
                <div class="mt-4 flex flex-wrap items-center gap-2 border-b border-slate-100 pb-4">
                    <button
                        type="button"
                        data-tab="ALL"
                        onclick="pilihTabJenjang('ALL')"
                        class="tab-jenjang rounded-lg border border-[#0b4f8a] bg-[#0b4f8a]/10 text-[#0b4f8a] px-3.5 py-2 text-xs font-bold transition cursor-pointer"
                    >
                        Semua Jenjang
                    </button>
                    <button
                        type="button"
                        data-tab="D3"
                        onclick="pilihTabJenjang('D3')"
                        class="tab-jenjang rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 px-3.5 py-2 text-xs font-semibold transition cursor-pointer"
                    >
                        D3 - Diploma 3
                    </button>
                    <button
                        type="button"
                        data-tab="S1"
                        onclick="pilihTabJenjang('S1')"
                        class="tab-jenjang rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 px-3.5 py-2 text-xs font-semibold transition cursor-pointer"
                    >
                        S1 - Strata 1
                    </button>
                    <button
                        type="button"
                        data-tab="S2"
                        onclick="pilihTabJenjang('S2')"
                        class="tab-jenjang rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 px-3.5 py-2 text-xs font-semibold transition cursor-pointer"
                    >
                        S2 - Pascasarjana
                    </button>
                </div>

                <!-- Daftar Kartu Program Studi -->
                <div id="daftar-kartu-prodi" class="mt-4 space-y-3">
                    @foreach ($daftarProdi as $item)
                        <div
                            class="kartu-prodi rounded-xl border border-slate-200 p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-[#0b4f8a]/50 transition"
                            data-jenjang="{{ $item['jenjang'] }}"
                            data-nama="{{ $item['nama'] }}"
                            data-sistem="{{ implode('|', $item['sistem']) }}"
                        >
                            <div>
                                <div class="flex flex-wrap items-center gap-2">
                                    <h3 class="text-sm sm:text-base font-bold text-slate-900">{{ $item['nama'] }}</h3>
                                    <span class="rounded-md bg-sky-50 border border-sky-200 px-2 py-0.5 text-[10px] font-bold text-[#0b4f8a]">
                                        Akreditasi {{ $item['akreditasi'] }}
                                    </span>
                                </div>
                                <p class="text-xs text-slate-500 mt-1">{{ $item['jalur'] }} &bull; {{ implode(', ', $item['sistem']) }}</p>
                            </div>

                            <button
                                type="button"
                                onclick='lihatDetailProdi(@json($item))'
                                class="self-start sm:self-center shrink-0 rounded-lg border border-[#0b4f8a] text-[#0b4f8a] hover:bg-[#0b4f8a] hover:text-white px-4 py-2 text-xs font-semibold transition cursor-pointer"
                            >
                                Lihat Detail
                            </button>
                        </div>
                    @endforeach
                </div>

                <div id="pesan-kosong-prodi" class="hidden mt-4 rounded-xl bg-slate-50 border border-slate-200 p-6 text-center text-xs sm:text-sm text-slate-500">
                    Tidak ada program studi yang sesuai dengan kriteria pencarian. Silakan ubah filter atau klik <strong>Tampilkan Semua</strong>.
                </div>
            </div>

            <!-- Kolom Kanan (4 kolom) -->
            <div class="lg:col-span-4 space-y-5">
                <!-- Brosur dan Informasi Biaya -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 sm:p-6">
                    <h3 class="text-base font-extrabold text-slate-900">Brosur Dan Informasi Biaya</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1.5 leading-relaxed">
                        Brosur dan rincian biaya selama kuliah di Universitas IPWIJA Tahun Akademik 2026/2027.
                    </p>
                    <button
                        type="button"
                        onclick="bukaModalBiaya()"
                        class="mt-4 inline-flex items-center justify-center rounded-lg border border-[#0b4f8a] text-[#0b4f8a] hover:bg-[#0b4f8a] hover:text-white px-4 py-2 text-xs font-semibold transition cursor-pointer"
                    >
                        Lihat Detail
                    </button>
                </div>

                <!-- Tata Cara Pendaftaran Mahasiswa Baru -->
                <div id="tata-cara" class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 sm:p-6">
                    <h3 class="text-base font-extrabold text-slate-900">Tata Cara Pendaftaran Mahasiswa Baru</h3>
                    <ol class="mt-3 space-y-3 text-xs sm:text-sm text-slate-600">
                        <li>
                            <strong class="text-slate-900">1. Pilih Jalur Pendaftaran</strong>
                            <p class="text-xs text-slate-500 mt-0.5">Tentukan jenjang dan program studi sesuai minat dan ketentuan kampus.</p>
                        </li>
                        <li>
                            <strong class="text-slate-900">2. Registrasi &amp; Isi Formulir</strong>
                            <p class="text-xs text-slate-500 mt-0.5">Buat akun PMB, lalu lengkapi biodata, data keluarga, dan riwayat pendidikan.</p>
                        </li>
                        <li>
                            <strong class="text-slate-900">3. Verifikasi &amp; Seleksi</strong>
                            <p class="text-xs text-slate-500 mt-0.5">Pantau verifikasi berkas, pembayaran, dan pengumuman hasil seleksi di dashboard.</p>
                        </li>
                    </ol>

                    <a
                        href="{{ route('register') }}"
                        class="mt-5 block w-full text-center rounded-lg bg-[#0b4f8a] hover:bg-[#083b69] text-white font-semibold py-2.5 px-4 text-xs sm:text-sm transition"
                    >
                        Daftar Calon Mahasiswa Baru
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Detail Prodi / Biaya -->
    <div
        id="modal-detail-prodi"
        class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/70 p-4 backdrop-blur-2xs"
        onclick="if (event.target === this) tutupModalDetail()"
    >
        <div class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-2xl border border-slate-200">
            <div class="flex items-start justify-between gap-3 border-b border-slate-100 pb-3.5">
                <div>
                    <span id="detail-badge" class="inline-block rounded-md bg-sky-100 px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider text-[#0b4f8a]"></span>
                    <h3 id="detail-judul" class="mt-1 text-lg font-extrabold text-slate-900"></h3>
                </div>
                <button
                    type="button"
                    onclick="tutupModalDetail()"
                    class="rounded-lg px-2 py-1 text-sm font-bold text-slate-400 hover:bg-slate-100 hover:text-slate-700 cursor-pointer"
                >
                    &times;
                </button>
            </div>

            <div id="detail-konten" class="mt-4 space-y-3 text-xs sm:text-sm text-slate-600 leading-relaxed"></div>

            <div class="mt-6 flex flex-wrap items-center justify-end gap-2.5 border-t border-slate-100 pt-4">
                <a
                    href="{{ route('register') }}"
                    class="rounded-lg bg-[#0b4f8a] hover:bg-[#083b69] px-4 py-2 text-xs font-semibold text-white transition"
                >
                    Daftar Program Ini
                </a>
                <button
                    type="button"
                    onclick="tutupModalDetail()"
                    class="rounded-lg border border-slate-200 bg-white hover:bg-slate-50 px-4 py-2 text-xs font-semibold text-slate-700 transition cursor-pointer"
                >
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        let tabAktif = 'ALL';

        function pilihTabJenjang(jenjang) {
            tabAktif = jenjang;
            document.getElementById('filter-jenjang').value = jenjang === 'ALL' ? '' : jenjang;

            document.querySelectorAll('.tab-jenjang').forEach(btn => {
                if (btn.dataset.tab === jenjang) {
                    btn.className = 'tab-jenjang rounded-lg border border-[#0b4f8a] bg-[#0b4f8a]/10 text-[#0b4f8a] px-3.5 py-2 text-xs font-bold transition cursor-pointer';
                } else {
                    btn.className = 'tab-jenjang rounded-lg border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 px-3.5 py-2 text-xs font-semibold transition cursor-pointer';
                }
            });

            terapkanFilterProdi();
        }

        function terapkanFilterProdi() {
            const jenjang = document.getElementById('filter-jenjang').value;
            const prodi = document.getElementById('filter-prodi').value;
            const sistem = document.getElementById('filter-sistem').value;

            let tampil = 0;
            document.querySelectorAll('.kartu-prodi').forEach(kartu => {
                const cocokJenjang = !jenjang || kartu.dataset.jenjang === jenjang;
                const cocokProdi = !prodi || kartu.dataset.nama === prodi;
                const cocokSistem = !sistem || kartu.dataset.sistem.split('|').includes(sistem);

                if (cocokJenjang && cocokProdi && cocokSistem) {
                    kartu.classList.remove('hidden');
                    tampil++;
                } else {
                    kartu.classList.add('hidden');
                }
            });

            const pesanKosong = document.getElementById('pesan-kosong-prodi');
            if (tampil === 0) {
                pesanKosong.classList.remove('hidden');
            } else {
                pesanKosong.classList.add('hidden');
            }
        }

        function resetFilterProdi() {
            document.getElementById('filter-jenjang').value = '';
            document.getElementById('filter-prodi').value = '';
            document.getElementById('filter-sistem').value = '';
            pilihTabJenjang('ALL');
        }

        function lihatDetailProdi(item) {
            document.getElementById('detail-badge').textContent = item.label_jenjang + ' • Akreditasi ' + item.akreditasi;
            document.getElementById('detail-judul').textContent = item.nama;
            document.getElementById('detail-konten').innerHTML = `
                <p>${item.deskripsi}</p>
                <div class="rounded-xl bg-slate-50 border border-slate-200/80 p-3.5 space-y-1.5 text-xs">
                    <p><strong>Fakultas:</strong> ${item.fakultas || '-'}</p>
                    <p><strong>Program Pendidikan:</strong> ${item.label_jenjang}</p>
                    <p><strong>Status Jalur:</strong> ${item.jalur}</p>
                    <p><strong>Pilihan Sistem Kuliah:</strong> ${item.sistem.join(', ')}</p>
                </div>
            `;

            const formPilih = document.getElementById('form-pilih-prodi');
            if (formPilih) {
                document.getElementById('input-fakultas').value = item.fakultas || '';
                document.getElementById('input-program-pendidikan').value = item.label_jenjang || '';
                document.getElementById('input-pilihan-prodi').value = item.nama || '';

                const selectSistem = document.getElementById('select-sistem-kuliah');
                selectSistem.innerHTML = item.sistem
                    .map(s => `<option value="${s}">${s}</option>`)
                    .join('');
            }

            const modal = document.getElementById('modal-detail-prodi');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function bukaModalBiaya() {
            document.getElementById('detail-badge').textContent = 'Informasi Biaya & Brosur';
            document.getElementById('detail-judul').textContent = 'Rincian Biaya Kuliah Universitas IPWIJA';
            document.getElementById('detail-konten').innerHTML = `
                <p>Universitas IPWIJA menyediakan skema biaya pendidikan yang terjangkau dengan pilihan pembayaran per semester maupun angsuran bulanan:</p>
                <ul class="list-disc pl-5 space-y-1 text-xs">
                    <li><strong>Biaya Pendaftaran:</strong> Sesuai jalur &amp; gelombang pendaftaran aktif.</li>
                    <li><strong>Dana Pengembangan &amp; SPP:</strong> Tersedia opsi cicilan fleksibel untuk kelas Reguler maupun Kelas Karyawan.</li>
                    <li><strong>Beasiswa:</strong> Tersedia jalur Beasiswa Prestasi Akademik, Non-Akademik, dan KIP-Kuliah.</li>
                </ul>
            `;
            const modal = document.getElementById('modal-detail-prodi');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function tutupModalDetail() {
            const modal = document.getElementById('modal-detail-prodi');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</body>
</html>


