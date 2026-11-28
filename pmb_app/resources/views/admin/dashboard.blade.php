<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - PMB Universitas IPWIJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">
    <nav class="bg-[#005f92] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            <div class="flex items-center gap-3 min-w-0">
                <img src="{{ asset('images/logo-ipwija-header.png') }}" alt="Logo IPWIJA" class="h-8 w-auto bg-white rounded p-1 shrink-0">
                <span class="font-extrabold text-sm sm:text-base truncate">PMB IPWIJA &bull; ADMIN</span>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <span class="hidden sm:inline text-xs text-sky-100">{{ Auth::user()->email }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-lg bg-white/15 hover:bg-white/25 px-3 py-1.5 text-xs font-semibold cursor-pointer">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <header class="bg-gradient-to-r from-[#0077b6] to-[#004e7c] text-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-xl sm:text-2xl font-extrabold">Halo, {{ Auth::user()->name }}</h1>
                <p class="text-xs sm:text-sm text-sky-100 mt-1">Dashboard Admin PMB Universitas IPWIJA (Periode 2026/2027)</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                @csrf
                <button type="submit" class="inline-flex items-center rounded-xl bg-white/15 hover:bg-white/25 border border-white/20 px-3.5 py-2 text-xs font-semibold text-white transition cursor-pointer">
                    Keluar dari Akun
                </button>
            </form>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7 space-y-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-xs text-slate-400">Total Akun</p>
                <p class="text-2xl font-extrabold text-[#0077b6] mt-1">{{ $totalAkun }}</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-xs text-slate-400">Calon Mahasiswa</p>
                <p class="text-2xl font-extrabold text-slate-800 mt-1">{{ $totalCalonMahasiswa }}</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-xs text-slate-400">Verifikasi Berkas</p>
                <p class="text-2xl font-extrabold text-amber-600 mt-1">0</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-xs text-slate-400">Status Seleksi</p>
                <p class="text-2xl font-extrabold text-emerald-600 mt-1">Aktif</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-1.5 shadow-sm flex flex-wrap gap-1.5">
            @php
                $tabs = [
                    'ringkasan' => 'Ringkasan',
                    'calon-mahasiswa' => 'Calon Mahasiswa',
                    'verifikasi-berkas' => 'Verifikasi Berkas',
                    'pengaturan-seleksi' => 'Pengaturan Seleksi',
                ];
            @endphp
            @foreach ($tabs as $key => $label)
                <a href="{{ route('admin.dashboard', ['tab' => $key]) }}"
                   class="px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition {{ $tab === $key ? 'bg-[#0077b6] text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        @if ($tab === 'ringkasan')
            <section class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <h2 class="text-sm font-bold text-slate-800">Alur Kerja Admin PMB</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mt-3 text-xs">
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-3.5">
                        <p class="font-bold text-[#0077b6]">1. Ringkasan</p>
                        <p class="text-slate-600 mt-1">Pantau jumlah akun, calon mahasiswa, dan status seleksi.</p>
                    </div>
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-3.5">
                        <p class="font-bold text-[#0077b6]">2. Calon Mahasiswa</p>
                        <p class="text-slate-600 mt-1">Cari nama, email, atau NIK serta filter kelengkapan data.</p>
                    </div>
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-3.5">
                        <p class="font-bold text-[#0077b6]">3. Detail Pendaftar</p>
                        <p class="text-slate-600 mt-1">Periksa biodata, data keluarga, dan riwayat pendidikan.</p>
                    </div>
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-3.5">
                        <p class="font-bold text-[#0077b6]">4. Pengaturan Seleksi</p>
                        <p class="text-slate-600 mt-1">Cek status periode seleksi yang sedang berjalan.</p>
                    </div>
                </div>
            </section>
        @endif

        @if (in_array($tab, ['ringkasan', 'calon-mahasiswa', 'verifikasi-berkas']))
            <section class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-5 py-4 border-b border-slate-200 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div class="min-w-0">
                        <h2 class="text-base font-bold text-slate-800">
                            @if ($tab === 'ringkasan')
                                Ringkasan Data Calon Mahasiswa
                            @elseif ($tab === 'verifikasi-berkas')
                                Pemeriksaan Kelengkapan &amp; Verifikasi Data
                            @else
                                Semua Data Calon Mahasiswa
                            @endif
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Pantau kelengkapan biodata, keluarga, pendidikan, dan status pembayaran.</p>
                    </div>

                    <form method="GET" action="{{ route('admin.dashboard') }}" class="flex flex-wrap sm:flex-nowrap items-center gap-2 shrink-0">
                        <input type="hidden" name="tab" value="{{ $tab }}">
                        <input
                            type="text"
                            name="q"
                            value="{{ $search }}"
                            placeholder="Cari nama, email, NIK..."
                            class="w-full sm:w-56 rounded-xl border-slate-300 text-xs sm:text-sm focus:border-[#0077b6] focus:ring-[#0077b6]"
                        >
                        <select name="status" class="rounded-xl border-slate-300 text-xs sm:text-sm focus:border-[#0077b6] focus:ring-[#0077b6]">
                            <option value="">Semua Kelengkapan</option>
                            <option value="lengkap" @selected($statusFilter === 'lengkap')>Data Lengkap</option>
                            <option value="belum_lengkap" @selected($statusFilter === 'belum_lengkap')>Belum Lengkap</option>
                        </select>
                        <button type="submit" class="rounded-xl bg-[#0077b6] hover:bg-[#005f92] text-white px-4 py-2 text-xs sm:text-sm font-semibold cursor-pointer shrink-0">
                            Filter
                        </button>
                        @if ($search !== '' || $statusFilter !== '')
                            <a href="{{ route('admin.dashboard', ['tab' => $tab]) }}" class="rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-600 px-3 py-2 text-xs sm:text-sm font-semibold text-center shrink-0">
                                Reset
                            </a>
                        @endif
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[780px] divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-5 py-3.5 w-[28%]">Calon Mahasiswa</th>
                                <th class="px-5 py-3.5 w-[30%]">Kelengkapan Data</th>
                                <th class="px-5 py-3.5 w-[14%]">Pembayaran</th>
                                <th class="px-5 py-3.5 w-[13%]">Tanggal Daftar</th>
                                <th class="px-5 py-3.5 w-[15%] text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @forelse ($pendaftar as $item)
                                @php
                                    $biodataLengkap = !empty($item->nik) && !empty($item->no_hp) && !empty($item->alamat);
                                    $keluargaLengkap = $item->keluargas_count > 0;
                                    $pendidikanLengkap = $item->pendidikans_count > 0;
                                    $semuaLengkap = $biodataLengkap && $keluargaLengkap && $pendidikanLengkap;
                                @endphp
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="px-5 py-4">
                                        <p class="font-bold text-slate-800">{{ \Illuminate\Support\Str::title($item->name) }}</p>
                                        <p class="text-xs text-slate-500">{{ $item->email }}</p>
                                        @if ($item->nik)
                                            <p class="text-[11px] text-slate-400 mt-0.5">NIK: {{ $item->nik }}</p>
                                        @endif
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="mb-1.5">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold {{ $semuaLengkap ? 'bg-emerald-600 text-white' : 'bg-amber-500 text-white' }}">
                                                {{ $semuaLengkap ? 'Lengkap' : 'Belum Lengkap' }}
                                            </span>
                                        </div>
                                        <div class="flex flex-wrap gap-1.5">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $biodataLengkap ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                                Biodata: {{ $biodataLengkap ? 'Lengkap' : 'Belum' }}
                                            </span>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $keluargaLengkap ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                                Keluarga ({{ $item->keluargas_count }})
                                            </span>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $pendidikanLengkap ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                                Pendidikan ({{ $item->pendidikans_count }})
                                            </span>
                                        </div>
                                        <p class="text-xs mt-1.5 {{ !empty($item->pilihan_prodi) ? 'text-slate-700 font-medium' : 'text-slate-400' }}">
                                            @if (!empty($item->pilihan_prodi))
                                                Prodi: {{ $item->pilihan_prodi }}{{ !empty($item->sistem_kuliah) ? ' &middot; ' . $item->sistem_kuliah : '' }}
                                            @else
                                                Prodi belum dipilih
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">
                                            Belum Bayar
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 text-xs text-slate-500">
                                        {{ $item->created_at?->format('d M Y') ?? '-' }}
                                    </td>
                                    <td class="px-5 py-4 text-right">
                                        <a href="{{ route('admin.dashboard', ['tab' => $tab, 'q' => $search, 'status' => $statusFilter, 'detail' => $item->id]) }}#panel-detail"
                                           class="inline-flex items-center rounded-xl bg-[#0077b6] hover:bg-[#005f92] text-white px-3.5 py-2 text-xs font-semibold transition">
                                            Detail &amp; Verifikasi
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-5 py-10 text-center">
                                        @if ($search !== '' || $statusFilter !== '')
                                            <p class="text-sm font-semibold text-slate-700">
                                                Belum ada pendaftar yang cocok dengan filter ini.
                                            </p>
                                            <p class="text-xs text-slate-500 mt-1">
                                                @if ($statusFilter === 'lengkap')
                                                    Status <span class="font-semibold text-slate-700">Data Lengkap</span> memerlukan biodata, keluarga, dan pendidikan terisi semua.
                                                @elseif ($statusFilter === 'belum_lengkap')
                                                    Seluruh pendaftar yang tampil sudah melengkapi datanya.
                                                @else
                                                    Coba kata kunci lain atau tampilkan kembali seluruh data.
                                                @endif
                                            </p>
                                            <div class="mt-3">
                                                <a href="{{ route('admin.dashboard', ['tab' => $tab]) }}"
                                                   class="inline-flex items-center rounded-xl border border-slate-300 bg-white hover:bg-slate-50 text-slate-700 px-3.5 py-1.5 text-xs font-semibold transition">
                                                    Reset Filter &amp; Tampilkan Semua
                                                </a>
                                            </div>
                                        @else
                                            <p class="text-sm font-semibold text-slate-700">
                                                Belum ada calon mahasiswa yang terdaftar.
                                            </p>
                                            <p class="text-xs text-slate-500 mt-1">
                                                Data pendaftar baru akan tampil di sini setelah akun calon mahasiswa dibuat.
                                            </p>
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        @elseif ($tab === 'pengaturan-seleksi')
            <section class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-4">
                <div>
                    <h2 class="text-base font-bold text-slate-800">Pengaturan Periode &amp; Status Seleksi</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Informasi periode penerimaan mahasiswa baru yang sedang aktif.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">
                        <p class="text-slate-400">Periode Akademik</p>
                        <p class="text-sm font-bold text-slate-800 mt-1">2026/2027</p>
                    </div>
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">
                        <p class="text-slate-400">Status Seleksi</p>
                        <p class="text-sm font-bold text-emerald-600 mt-1">Aktif</p>
                    </div>
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">
                        <p class="text-slate-400">Total Pendaftar Terdaftar</p>
                        <p class="text-sm font-bold text-[#0077b6] mt-1">{{ $totalCalonMahasiswa }} Calon Mahasiswa</p>
                    </div>
                </div>
            </section>
        @endif

        @if ($pendaftarDetail)
            <section id="panel-detail" class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-slate-200 pb-4">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-[#0077b6]">Detail Calon Mahasiswa</span>
                        <h2 class="text-lg font-extrabold text-slate-800 mt-0.5">{{ \Illuminate\Support\Str::title($pendaftarDetail->name) }}</h2>
                        <p class="text-xs text-slate-500">{{ $pendaftarDetail->email }}</p>
                        @php
                            $detailBiodataOk = !empty($pendaftarDetail->nik) && !empty($pendaftarDetail->no_hp) && !empty($pendaftarDetail->alamat);
                            $detailKeluargaOk = $pendaftarDetail->keluargas->isNotEmpty();
                            $detailPendidikanOk = $pendaftarDetail->pendidikans->isNotEmpty();
                            $detailLengkap = $detailBiodataOk && $detailKeluargaOk && $detailPendidikanOk;
                        @endphp
                        <div class="flex flex-wrap items-center gap-2 mt-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold {{ $detailLengkap ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                {{ $detailLengkap ? 'Data Lengkap' : 'Data Belum Lengkap' }}
                            </span>
                            <span class="text-xs text-slate-600">
                                Prodi: <strong class="text-slate-800">{{ $pendaftarDetail->pilihan_prodi ?? 'Belum dipilih' }}</strong>
                                @if (!empty($pendaftarDetail->sistem_kuliah))
                                    &bull; <span class="font-semibold text-slate-700">{{ $pendaftarDetail->sistem_kuliah }}</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('admin.dashboard', ['tab' => $tab, 'q' => $search, 'status' => $statusFilter]) }}"
                       class="inline-flex items-center rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 px-3.5 py-2 text-xs font-semibold">
                        Tutup Detail
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4 space-y-1.5">
                        <p class="font-bold text-slate-700 text-sm mb-2">Biodata</p>
                        <p><span class="text-slate-400">NIK:</span> <span class="font-semibold text-slate-700">{{ $pendaftarDetail->nik ?? '-' }}</span></p>
                        <p><span class="text-slate-400">Tanggal Lahir:</span> <span class="font-semibold text-slate-700">{{ $pendaftarDetail->tanggal_lahir?->format('d M Y') ?? '-' }}</span></p>
                        <p><span class="text-slate-400">No. HP:</span> <span class="font-semibold text-slate-700">{{ $pendaftarDetail->no_hp ?? '-' }}</span></p>
                        <p><span class="text-slate-400">Alamat:</span> <span class="font-semibold text-slate-700">{{ $pendaftarDetail->alamat ?? '-' }}</span></p>
                    </div>

                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4 space-y-2">
                        <p class="font-bold text-slate-700 text-sm mb-2">Data Keluarga</p>
                        @forelse ($pendaftarDetail->keluargas as $kel)
                            <div class="rounded-lg bg-white border border-slate-200 p-2.5">
                                <p class="font-semibold text-slate-800">{{ $kel->nama }} <span class="text-slate-400">({{ $kel->hubungan }})</span></p>
                                <p class="text-slate-500">HP: {{ $kel->hp ?? '-' }}</p>
                            </div>
                        @empty
                            <p class="text-slate-500">Belum ada data keluarga.</p>
                        @endforelse
                    </div>

                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4 space-y-2">
                        <p class="font-bold text-slate-700 text-sm mb-2">Riwayat Pendidikan</p>
                        @forelse ($pendaftarDetail->pendidikans as $pen)
                            <div class="rounded-lg bg-white border border-slate-200 p-2.5">
                                <p class="font-semibold text-slate-800">{{ $pen->jenjang }} - {{ $pen->nama_sekolah }}</p>
                                <p class="text-slate-500">Jurusan: {{ $pen->jurusan ?? '-' }} &bull; Lulus: {{ $pen->tahun_lulus ?? '-' }}</p>
                            </div>
                        @empty
                            <p class="text-slate-500">Belum ada riwayat pendidikan.</p>
                        @endforelse
                    </div>
                </div>
            </section>
        @endif
    </main>
</body>
</html>
