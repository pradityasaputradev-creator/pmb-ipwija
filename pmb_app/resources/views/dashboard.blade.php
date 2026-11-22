<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Calon Mahasiswa - PMB Universitas IPWIJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f3f6fa] text-slate-800 antialiased">
    @php
        $user = auth()->user();
        $nama = $user?->name ?? 'Calon Mahasiswa';
        $email = $user?->email ?? '-';
        $parts = preg_split('/\s+/', trim($nama));
        $inisial = strtoupper(substr($parts[0] ?? 'P', 0, 1) . substr($parts[1] ?? ($parts[0] ?? 'M'), 0, 1));
        $jam = (int) now()->format('H');
        $sapaanWaktu = match (true) {
            $jam < 11 => 'Selamat Pagi',
            $jam < 15 => 'Selamat Siang',
            $jam < 18 => 'Selamat Sore',
            default => 'Selamat Malam',
        };
    @endphp

    <!-- Top Header & Banner (Mirip Struktur Referensi, Nuansa Biru IPWIJA) -->
    <header class="bg-gradient-to-b from-[#0b4f8a] to-[#083b69] text-white shadow-sm">
        <div class="mx-auto max-w-5xl px-4 pt-4 pb-3 sm:px-6">
            <div class="flex items-start justify-between gap-3">
                <div class="w-24">
                    <img src="{{ asset('images/logo-ipwija-header.png') }}" alt="Logo IPWIJA" class="h-10 w-10 rounded-full bg-white p-1 object-contain">
                </div>

                <div class="text-center">
                    <div class="text-base font-extrabold tracking-wide sm:text-xl">UNIVERSITAS IPWIJA</div>
                    <div class="text-xs text-sky-100 sm:text-sm">Portal Calon Mahasiswa - Tahun Akademik 2026/2027</div>
                </div>

                <div class="flex w-24 justify-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-lg border border-white/25 bg-white/10 px-2.5 py-1 text-[11px] font-semibold text-white transition hover:bg-white/20">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h1 class="text-xl font-bold tracking-tight sm:text-2xl">{{ $sapaanWaktu }}, {{ $nama }}!</h1>
                    <p class="mt-0.5 text-xs text-sky-100">Status: <span class="font-semibold text-white">Calon Mahasiswa</span></p>
                </div>

                <div class="flex flex-wrap items-center gap-2 text-[11px] text-sky-100">
                    <button type="button" onclick="window.location.reload()" class="inline-flex items-center gap-1.5 rounded-md border border-white/25 bg-white/10 px-2.5 py-1 font-semibold text-white transition hover:bg-white/20">
                        <span>&#8635;</span>
                        <span>Refresh</span>
                    </button>
                    <span>Terakhir Diperbarui: {{ now()->translatedFormat('d F Y') }} pukul {{ now()->format('H.i') }} WIB</span>
                </div>
            </div>
        </div>

        <div class="border-t border-white/15 bg-[#07335c] text-[11px] text-sky-100">
            <div class="mx-auto flex max-w-5xl flex-wrap items-center justify-between gap-2 px-4 py-2 sm:px-6">
                <div>Periode Akademik: <span class="font-semibold text-white">2026/2027</span></div>
                <div>Semester: <span class="font-semibold text-white">Semester Ganjil</span></div>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-5xl space-y-5 px-4 py-6 sm:px-6">
        <!-- Row 1: Informasi Profil & Kelengkapan Profil -->
        <section class="grid grid-cols-1 gap-5 lg:grid-cols-12">
            <!-- Informasi Profil -->
            <div class="rounded-2xl border border-slate-200/90 bg-white p-5 shadow-2xs lg:col-span-6">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-base font-bold text-slate-900">Informasi Profil</h2>
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-[#0b4f8a] hover:underline">
                        <span>&#9998;</span>
                        <span>Edit</span>
                    </a>
                </div>

                <div class="flex flex-col gap-4 sm:flex-row">
                    <div class="flex shrink-0 flex-col items-center">
                        <div class="flex h-28 w-24 items-center justify-center rounded-xl border border-slate-200 bg-sky-50 text-2xl font-bold text-[#0b4f8a]">
                            {{ $inisial }}
                        </div>
                        <a href="{{ route('profile.edit') }}" class="mt-2 inline-flex items-center gap-1 rounded-md border border-slate-200 bg-white px-2.5 py-1 text-[11px] font-medium text-slate-700 transition hover:bg-slate-50">
                            <span>&#128247;</span>
                            <span>Ganti Foto</span>
                        </a>
                    </div>

                    <div class="min-w-0 flex-1 space-y-2.5 text-xs">
                        <div>
                            <div class="text-[11px] text-slate-400">Nama Lengkap</div>
                            <div class="truncate text-sm font-bold text-slate-900">{{ $nama }}</div>
                        </div>

                        <div>
                            <div class="text-[11px] text-slate-400">Email</div>
                            <div class="truncate font-medium text-slate-700">{{ $email }}</div>
                        </div>

                        <div class="grid grid-cols-2 gap-2.5">
                            <div>
                                <div class="text-[11px] text-slate-400">No. Identitas</div>
                                <div class="font-semibold text-slate-500">Belum dilengkapi</div>
                            </div>
                            <div>
                                <div class="text-[11px] text-slate-400">Tanggal Lahir</div>
                                <div class="font-semibold text-slate-500">Belum dilengkapi</div>
                            </div>
                            <div>
                                <div class="text-[11px] text-slate-400">Nomor Telepon</div>
                                <div class="font-semibold text-slate-500">Belum dilengkapi</div>
                            </div>
                            <div>
                                <div class="text-[11px] text-slate-400">Nomor Registrasi</div>
                                <div class="font-semibold text-[#0b4f8a]">Belum terbit</div>
                            </div>
                        </div>

                        <div>
                            <div class="text-[11px] text-slate-400">Alamat</div>
                            <div class="font-medium text-slate-500">Belum dilengkapi</div>
                        </div>

                        <!-- Data Keluarga -->
                        <div class="pt-1">
                            <div class="mb-1.5 flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-800">Data Keluarga</span>
                                <a href="{{ route('keluarga.index') }}" class="text-[11px] font-semibold text-[#0b4f8a] hover:underline">Lihat Semua</a>
                            </div>
                            <div class="space-y-1.5">
                                <a href="{{ route('keluarga.index') }}" class="flex items-center justify-between rounded-lg border border-slate-200/80 bg-slate-50/70 px-3 py-2 text-xs text-slate-600 transition hover:border-sky-300 hover:bg-sky-50/50">
                                    <span><strong class="text-slate-800">Orang Tua / Wali</strong> <span class="text-slate-400">(Belum ditambahkan)</span></span>
                                    <span class="text-slate-400">&#128279;</span>
                                </a>
                            </div>
                        </div>

                        <!-- Pendidikan Terakhir -->
                        <div class="pt-1">
                            <div class="mb-1.5 flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-800">Pendidikan Terakhir</span>
                                <a href="{{ route('profile.edit') }}" class="text-[11px] font-semibold text-[#0b4f8a] hover:underline">Lihat Semua</a>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2.5 rounded-lg border border-slate-200/80 bg-slate-50/70 px-3 py-2.5 text-xs transition hover:border-sky-300 hover:bg-sky-50/50">
                                <span class="text-base text-[#0b4f8a]">&#127891;</span>
                                <div>
                                    <div class="font-bold text-slate-800">Belum dilengkapi</div>
                                    <div class="text-[11px] text-slate-400">SMA/SMK/MA atau Sederajat</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kelengkapan Profil -->
            <div class="flex flex-col justify-between rounded-2xl border border-slate-200/90 bg-white p-5 shadow-2xs lg:col-span-6">
                <div>
                    <div class="mb-4 flex items-start justify-between gap-3">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Kelengkapan Profil</h2>
                            <p class="text-xs text-slate-500">Lengkapi profil Anda untuk melanjutkan proses pendaftaran</p>
                        </div>
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border-2 border-[#0b4f8a] text-xs font-extrabold text-[#0b4f8a]">
                            25%
                        </div>
                    </div>

                    <div class="space-y-2.5">
                        <a href="{{ route('profile.edit') }}" class="block rounded-xl border border-slate-200/80 bg-slate-50/40 p-3 transition hover:border-emerald-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-100 text-sm text-emerald-700">&#128100;</span>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Data Pribadi</div>
                                        <div class="text-[10px] font-semibold uppercase tracking-wide text-emerald-700">Selesai</div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-emerald-700">100%</span>
                            </div>
                            <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                <div class="h-full w-full rounded-full bg-emerald-500"></div>
                            </div>
                        </a>

                        <a href="{{ route('keluarga.index') }}" class="block rounded-xl border border-slate-200/80 bg-slate-50/40 p-3 transition hover:border-sky-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-100 text-sm text-[#0b4f8a]">&#128106;</span>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Data Keluarga</div>
                                        <div class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">Belum ditambahkan</div>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold text-slate-400">0%</span>
                            </div>
                            <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                <div class="h-full w-0 rounded-full bg-emerald-500"></div>
                            </div>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="block rounded-xl border border-slate-200/80 bg-slate-50/40 p-3 transition hover:border-sky-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-100 text-sm text-[#0b4f8a]">&#127891;</span>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Riwayat Pendidikan</div>
                                        <div class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">Belum ditambahkan</div>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold text-slate-400">0%</span>
                            </div>
                            <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                <div class="h-full w-0 rounded-full bg-emerald-500"></div>
                            </div>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="block rounded-xl border border-slate-200/80 bg-slate-50/40 p-3 transition hover:border-sky-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-100 text-sm text-[#0b4f8a]">&#128247;</span>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Foto Profil</div>
                                        <div class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">Belum diupload</div>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold text-slate-400">0%</span>
                            </div>
                            <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                <div class="h-full w-0 rounded-full bg-emerald-500"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <a href="{{ route('profile.edit') }}" class="mt-4 flex items-center gap-3 rounded-xl border border-amber-200 bg-amber-50/60 p-3 transition hover:bg-amber-50">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">!</span>
                    <div>
                        <div class="text-xs font-bold text-amber-900">Profil Belum Lengkap</div>
                        <div class="text-[11px] text-amber-700">Klik untuk melengkapi data keluarga, pendidikan, dan foto profil</div>
                    </div>
                </a>
            </div>
        </section>

        <!-- Tab Jalur Pendaftaran -->
        <div>
            <div class="inline-flex items-center gap-2 rounded-t-xl border border-b-0 border-slate-200 bg-white px-4 py-2.5 text-xs font-bold text-[#0b4f8a]">
                <span>&#9200;</span>
                <span>PMB IPWIJA 2026/2027</span>
            </div>

            <div class="rounded-b-2xl rounded-tr-2xl border border-slate-200/90 bg-white p-5 shadow-2xs">
                <div class="mb-4 flex items-center justify-between text-xs text-slate-500">
                    <div>Periode: <span class="font-semibold text-slate-700">2026/2027</span></div>
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-sky-200 bg-sky-50 px-3 py-1 text-[11px] font-semibold text-[#0b4f8a]">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#0b4f8a]"></span>
                        <span>PENGISIAN DATA</span>
                    </span>
                </div>

                <h2 class="mb-3 text-base font-bold text-slate-900">Informasi Pendaftaran</h2>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                    <div class="rounded-xl border border-slate-200/80 bg-slate-50/60 p-3.5">
                        <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Nomor Registrasi</div>
                        <div class="mt-1 text-sm font-extrabold text-slate-800">Belum terbit</div>
                    </div>
                    <div class="rounded-xl border border-slate-200/80 bg-slate-50/60 p-3.5">
                        <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">No. Ujian</div>
                        <div class="mt-1 text-sm font-extrabold text-slate-800">-</div>
                    </div>
                    <div class="rounded-xl border border-slate-200/80 bg-slate-50/60 p-3.5">
                        <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Status</div>
                        <div class="mt-1">
                            <span class="inline-flex items-center gap-1 rounded-md bg-amber-100 px-2 py-0.5 text-xs font-semibold text-amber-800">
                                &#9200; Pengisian Data
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Status Pembayaran -->
                <div class="mt-3 flex flex-wrap items-center justify-between gap-2 rounded-xl border border-slate-200/80 bg-slate-50/40 px-4 py-3 text-xs">
                    <div>
                        <div class="text-[10px] font-semibold text-slate-400">No. Tagihan</div>
                        <div class="font-bold text-slate-700">-</div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-slate-500">Status</span>
                        <span class="inline-flex items-center gap-1 rounded-md bg-amber-100 px-2.5 py-0.5 text-[11px] font-semibold text-amber-800">
                            &#9200; Belum Dibayar
                        </span>
                    </div>
                </div>

                <!-- Pilihan Program Studi -->
                <div class="mt-6">
                    <div class="mb-3 flex items-center gap-2">
                        <span class="text-sm text-[#0b4f8a]">&#127891;</span>
                        <h3 class="text-sm font-bold text-slate-900">Pilihan Program Studi</h3>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-slate-200">
                        <table class="w-full text-left text-xs">
                            <thead class="bg-[#0b4f8a] text-white">
                                <tr>
                                    <th class="px-3.5 py-2.5 font-semibold">Pilihan</th>
                                    <th class="px-3.5 py-2.5 font-semibold">Fakultas</th>
                                    <th class="px-3.5 py-2.5 font-semibold">Program Pendidikan</th>
                                    <th class="px-3.5 py-2.5 font-semibold">Program Studi</th>
                                    <th class="px-3.5 py-2.5 font-semibold">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                <tr>
                                    <td class="px-3.5 py-3">
                                        <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-sky-100 text-[11px] font-bold text-[#0b4f8a]">1</span>
                                    </td>
                                    <td class="px-3.5 py-3 text-slate-500">-</td>
                                    <td class="px-3.5 py-3 text-slate-500">-</td>
                                    <td class="px-3.5 py-3 font-medium text-slate-600">Belum dipilih</td>
                                    <td class="px-3.5 py-3 text-slate-400">Menunggu pemilihan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3 flex justify-end">
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3.5 py-1.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-50">
                            <span>&#9432;</span>
                            <span>Detail Pendaftaran</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progres Pendaftaran -->
        <section class="rounded-2xl border border-slate-200/90 bg-white p-5 shadow-2xs">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Progres Pendaftaran</h2>
                    <p class="text-xs text-slate-500">Pelengkapan data &amp; tahapan pendaftaran</p>
                </div>
                <div class="text-right">
                    <div class="text-xl font-extrabold text-[#0b4f8a]">20%</div>
                    <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Selesai</div>
                </div>
            </div>

            <div class="mt-3 h-2 w-full overflow-hidden rounded-full bg-slate-100">
                <div class="h-full w-1/5 rounded-full bg-[#0b4f8a]"></div>
            </div>

            <div class="mt-4 flex flex-wrap items-center justify-between gap-3 rounded-xl border border-slate-200/70 bg-slate-50/60 px-4 py-3">
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-700">
                    <span class="h-2 w-2 rounded-full bg-[#0b4f8a]"></span>
                    <span>Pemilihan Program Studi</span>
                </div>
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-1.5 rounded-lg bg-[#0b4f8a] px-4 py-2 text-xs font-semibold text-white transition hover:bg-[#083b69]">
                    <span>Lengkapi Data</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <div class="mt-5">
                <div class="mb-3 flex items-center gap-2 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                    <span>&#9776;</span>
                    <span>Langkah-Langkah Pendaftaran</span>
                </div>

                <div class="space-y-2.5">
                    <div class="flex items-center justify-between rounded-xl border border-emerald-200/80 bg-emerald-50/30 px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-500 text-xs font-bold text-white">&#10003;</span>
                            <div>
                                <div class="text-xs font-bold text-slate-800 sm:text-sm">Registrasi Akun</div>
                                <div class="text-xs text-slate-500">Akun calon mahasiswa telah terdaftar</div>
                            </div>
                        </div>
                        <span class="rounded bg-emerald-100 px-2 py-0.5 text-[10px] font-bold uppercase text-emerald-700">Selesai</span>
                    </div>

                    <div class="flex items-center justify-between rounded-xl border border-sky-200 bg-sky-50/40 px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[#0b4f8a] text-xs font-bold text-white">2</span>
                            <div>
                                <div class="text-xs font-bold text-slate-800 sm:text-sm">Pemilihan Program Studi &amp; Data Tambahan</div>
                                <div class="text-xs text-slate-500">Lengkapi biodata, keluarga, pendidikan, dan pilihan prodi</div>
                            </div>
                        </div>
                        <span class="rounded bg-sky-100 px-2 py-0.5 text-[10px] font-bold uppercase text-[#0b4f8a]">Sedang Berlangsung</span>
                    </div>

                    <div class="flex items-center justify-between rounded-xl border border-slate-200/70 bg-white px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-slate-100 text-xs font-semibold text-slate-500">3</span>
                            <div>
                                <div class="text-xs font-bold text-slate-700 sm:text-sm">Verifikasi Data</div>
                                <div class="text-xs text-slate-400">Pemeriksaan keabsahan data dan berkas</div>
                            </div>
                        </div>
                        <span class="rounded bg-slate-100 px-2 py-0.5 text-[10px] font-bold uppercase text-slate-500">Menunggu</span>
                    </div>

                    <div class="flex items-center justify-between rounded-xl border border-slate-200/70 bg-white px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-slate-100 text-xs font-semibold text-slate-500">4</span>
                            <div>
                                <div class="text-xs font-bold text-slate-700 sm:text-sm">Tagihan Pembayaran</div>
                                <div class="text-xs text-slate-400">Cetak dan bayar biaya pendaftaran</div>
                            </div>
                        </div>
                        <span class="rounded bg-slate-100 px-2 py-0.5 text-[10px] font-bold uppercase text-slate-500">Menunggu</span>
                    </div>

                    <div class="flex items-center justify-between rounded-xl border border-slate-200/70 bg-white px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-slate-100 text-xs font-semibold text-slate-500">5</span>
                            <div>
                                <div class="text-xs font-bold text-slate-700 sm:text-sm">Kartu Ujian &amp; Seleksi</div>
                                <div class="text-xs text-slate-400">Cetak kartu peserta dan pantau hasil seleksi</div>
                            </div>
                        </div>
                        <span class="rounded bg-slate-100 px-2 py-0.5 text-[10px] font-bold uppercase text-slate-500">Menunggu</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
