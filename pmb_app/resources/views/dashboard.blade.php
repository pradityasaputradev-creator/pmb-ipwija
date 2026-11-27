<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Calon Mahasiswa - PMB Universitas IPWIJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #eef3f8;
            color: #1e293b;
        }
        .pmb-header {
            background-color: #08467d;
            color: #ffffff;
        }
        .pmb-container {
            max-width: 1020px;
            margin: 0 auto;
            padding: 0 24px;
        }
        .pmb-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 15px 0 13px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.14);
        }
        .pmb-logo-img {
            width: 42px;
            height: 42px;
            border-radius: 9999px;
            object-fit: contain;
            background-color: #ffffff;
            padding: 2px;
            flex-shrink: 0;
        }
        .pmb-univ-title {
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 0.02em;
            color: #ffffff;
            line-height: 1.2;
        }
        .pmb-univ-sub {
            font-size: 12px;
            color: #dbeafe;
            margin-top: 2px;
        }
        .pmb-btn-nav {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 13px;
            border-radius: 6px;
            background-color: #125894;
            border: 1px solid rgba(255, 255, 255, 0.22);
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }
        .pmb-btn-nav:hover {
            background-color: #1969ae;
        }
        .pmb-welcome-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 0 16px;
            flex-wrap: wrap;
        }
        .pmb-welcome-title {
            margin: 0;
            font-size: 24px;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.2;
        }
        .pmb-welcome-sub {
            margin: 4px 0 0;
            font-size: 12.5px;
            color: #dbeafe;
        }
        .pmb-welcome-sub strong {
            color: #ffffff;
            font-weight: 700;
        }
        .pmb-meta-bar {
            background-color: #063560;
            border-top: 1px solid rgba(255, 255, 255, 0.14);
            color: #dbeafe;
            font-size: 11.5px;
        }
        .pmb-meta-bar strong {
            color: #ffffff;
            font-weight: 700;
        }
        .pmb-main {
            max-width: 1020px;
            margin: 0 auto;
            padding: 22px 24px 36px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .pmb-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px 22px;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }
        .pmb-link-blue {
            color: #08467d;
            font-weight: 700;
            text-decoration: none;
        }
        .pmb-link-blue:hover {
            color: #125894;
            text-decoration: underline;
        }
        .pmb-avatar-box {
            width: 96px;
            height: 112px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            background-color: #eef3f8;
            color: #08467d;
            font-size: 26px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pmb-progress-circle {
            width: 44px;
            height: 44px;
            border-radius: 9999px;
            border: 2px solid #08467d;
            color: #08467d;
            font-size: 12px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .pmb-icon-blue {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background-color: #dbeafe;
            color: #08467d;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .pmb-tab-head {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 10px 10px 0 0;
            border: 1px solid #e2e8f0;
            border-bottom: none;
            background-color: #ffffff;
            color: #08467d;
            font-size: 12.5px;
            font-weight: 800;
        }
        .pmb-tab-body {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 0 10px 10px 10px;
            padding: 20px 22px;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }
        .pmb-pill-blue {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 9999px;
            border: 1px solid #bfdbfe;
            background-color: #eff6ff;
            color: #08467d;
            font-size: 11px;
            font-weight: 700;
        }
        .pmb-table-head {
            background-color: #08467d;
            color: #ffffff;
        }
        .pmb-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 15px;
            border-radius: 6px;
            background-color: #08467d;
            border: 1px solid #08467d;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }
        .pmb-btn-primary:hover {
            background-color: #063560;
        }
        .pmb-step-active {
            border: 1px solid #bfdbfe;
            background-color: #f0f7ff;
        }
        .pmb-step-num-active {
            width: 24px;
            height: 24px;
            border-radius: 9999px;
            background-color: #08467d;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .pmb-step-badge-active {
            border-radius: 5px;
            background-color: #dbeafe;
            color: #08467d;
            padding: 2px 8px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    @php
        $user = auth()->user();
        $pathFoto = $fotoCalonMahasiswa?->path_foto ?? $user?->fotoCalonMahasiswa?->path_foto;
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

    <header class="pmb-header">
        <div class="pmb-container">
            <div class="pmb-topbar">
                <div style="width:110px;">
                    <img src="{{ asset('images/logo-ipwija-header.png') }}" alt="Logo IPWIJA" class="pmb-logo-img">
                </div>

                <div style="text-align:center;">
                    <div class="pmb-univ-title">UNIVERSITAS IPWIJA</div>
                    <div class="pmb-univ-sub">Portal Calon Mahasiswa - Tahun Akademik 2026/2027</div>
                </div>

                <div style="width:110px;display:flex;justify-content:flex-end;">
                    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                        @csrf
                        <button type="submit" class="pmb-btn-nav">Keluar</button>
                    </form>
                </div>
            </div>

            <div class="pmb-welcome-row">
                <div>
                    <h1 class="pmb-welcome-title">{{ $sapaanWaktu }}, {{ $nama }}!</h1>
                    <p class="pmb-welcome-sub">Status: <strong>Calon Mahasiswa</strong></p>
                </div>

                <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;font-size:11.5px;color:#dbeafe;">
                    <button type="button" onclick="window.location.reload()" class="pmb-btn-nav">
                        <span>&#8635;</span>
                        <span>Refresh</span>
                    </button>
                    <span>Terakhir Diperbarui: {{ now()->translatedFormat('d F Y') }} pukul {{ now()->format('H.i') }} WIB</span>
                </div>
            </div>
        </div>

        <div class="pmb-meta-bar">
            <div class="pmb-container" style="display:flex;align-items:center;justify-content:space-between;gap:12px;padding-top:8px;padding-bottom:8px;flex-wrap:wrap;">
                <div>Periode Akademik: <strong>2026/2027</strong></div>
                <div>Semester: <strong>Semester Ganjil</strong></div>
            </div>
        </div>
    </header>

    <main class="pmb-main">
        <section class="grid grid-cols-1 gap-5 lg:grid-cols-12">
            <div class="pmb-card lg:col-span-6">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-base font-bold text-slate-900">Informasi Profil</h2>
                    <a href="{{ route('profile.edit') }}" class="pmb-link-blue inline-flex items-center gap-1 text-xs">
                        <span>&#9998;</span>
                        <span>Edit</span>
                    </a>
                </div>

                <div class="flex flex-col gap-4 sm:flex-row">
                    <div class="flex shrink-0 flex-col items-center">
                        @if (!empty($pathFoto))
                            <img
                                src="{{ asset('storage/' . $pathFoto) }}"
                                alt="Foto {{ $nama }}"
                                class="h-20 w-20 rounded-xl border border-slate-200 object-cover shadow-xs"
                            >
                        @else
                            <div class="pmb-avatar-box">{{ $inisial }}</div>
                        @endif
                        <button
                            type="button"
                            onclick="bukaModalFoto()"
                            class="mt-2 inline-flex items-center gap-1 rounded-md border border-slate-200 bg-white px-2.5 py-1 text-[11px] font-medium text-slate-700 transition hover:bg-slate-50"
                        >
                            <span>&#128247;</span>
                            <span>{{ !empty($pathFoto) ? 'Ganti Foto' : 'Upload Foto' }}</span>
                        </button>
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
                                <div class="font-semibold text-slate-700">{{ filled($user->nik) ? $user->nik : '' }}</div>
                            </div>
                            <div>
                                <div class="text-[11px] text-slate-400">Tanggal Lahir</div>
                                <div class="font-semibold text-slate-700">{{ filled($user->tanggal_lahir) ? (\Illuminate\Support\Carbon::parse($user->tanggal_lahir)->format('d-m-Y')) : '' }}</div>
                            </div>
                            <div>
                                <div class="text-[11px] text-slate-400">Nomor Telepon</div>
                                <div class="font-semibold text-slate-700">{{ filled($user->no_hp) ? $user->no_hp : '' }}</div>
                            </div>
                            <div>
                                <div class="text-[11px] text-slate-400">Nomor Registrasi</div>
                                <div class="font-bold" style="color:#08467d;">Belum terbit</div>
                            </div>
                        </div>

                        <div>
                            <div class="text-[11px] text-slate-400">Alamat</div>
                            <div class="font-medium text-slate-700">{{ filled($user->alamat) ? $user->alamat : '' }}</div>
                        </div>

                        <div class="pt-1">
                            <div class="mb-1.5 flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-800">Data Keluarga</span>
                                <a href="{{ route('keluarga.index') }}" class="pmb-link-blue text-[11px]">Lihat Semua</a>
                            </div>
                            <div class="space-y-1.5">
                                @foreach ($daftarKeluarga as $kel)
                                    <a href="{{ route('keluarga.index') }}" class="flex items-center justify-between rounded-lg border border-slate-200/80 bg-slate-50/70 px-3 py-2 text-xs text-slate-600 transition hover:bg-slate-100/70">
                                        <span>
                                            <strong class="text-slate-800">{{ $kel->hubungan }}</strong>
                                            @if (filled($kel->nama))
                                                <span class="text-slate-700">- {{ $kel->nama }}</span>
                                            @endif
                                            @if (filled($kel->hp))
                                                <span class="text-slate-400">({{ $kel->hp }})</span>
                                            @endif
                                        </span>
                                        <span class="text-slate-400">&#128279;</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        @php
                            $pendidikanTerakhir = isset($daftarPendidikan) ? $daftarPendidikan->last() : null;
                        @endphp
                        <div class="pt-1">
                            <div class="mb-1.5 flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-800">Pendidikan Terakhir</span>
                                <a href="{{ route('pendidikan.index') }}" class="pmb-link-blue text-[11px]">Lihat Semua</a>
                            </div>
                            @if ($pendidikanTerakhir)
                                <a href="{{ route('pendidikan.index') }}" class="flex items-center gap-2.5 rounded-lg border border-slate-200/80 bg-slate-50/70 px-3 py-2.5 text-xs transition hover:bg-slate-100/70">
                                    <span class="text-base" style="color:#08467d;">&#127891;</span>
                                    <div class="min-w-0">
                                        <div class="font-bold text-slate-800">
                                            {{ filled($pendidikanTerakhir->jenjang) ? $pendidikanTerakhir->jenjang : 'Pendidikan Terakhir' }}
                                            @if (filled($pendidikanTerakhir->tahun_lulus))
                                                <span class="font-normal text-slate-500">({{ $pendidikanTerakhir->tahun_lulus }})</span>
                                            @endif
                                        </div>
                                        <div class="truncate text-[11px] text-slate-600">
                                            {{ filled($pendidikanTerakhir->nama_sekolah) ? $pendidikanTerakhir->nama_sekolah : '-' }}
                                            @if (filled($pendidikanTerakhir->jurusan))
                                                &middot; {{ $pendidikanTerakhir->jurusan }}
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2.5 rounded-lg border border-slate-200/80 bg-slate-50/70 px-3 py-2.5 text-xs transition hover:bg-slate-100/70">
                                    <span class="text-base" style="color:#08467d;">&#127891;</span>
                                    <div>
                                        <div class="font-bold text-slate-800">Belum dilengkapi</div>
                                        <div class="text-[11px] text-slate-400">SMA/SMK/MA atau Sederajat</div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @php
                $pribadiFields = [
                    filled($user->nik),
                    filled($user->tanggal_lahir),
                    filled($user->no_hp),
                    filled($user->alamat),
                ];
                $pribadiTerisi = count(array_filter($pribadiFields));
                $pribadiPct = (int) round(($pribadiTerisi / count($pribadiFields)) * 100);
                $pribadiSelesai = $pribadiTerisi === count($pribadiFields);

                $keluargaCount = isset($daftarKeluarga) ? $daftarKeluarga->count() : 0;
                $keluargaSelesai = $keluargaCount > 0;
                $keluargaPct = $keluargaSelesai ? 100 : 0;

                $pendidikanCount = isset($daftarPendidikan) ? $daftarPendidikan->count() : 0;
                $pendidikanSelesai = $pendidikanCount > 0;
                $pendidikanPct = $pendidikanSelesai ? 100 : 0;

                $totalKelengkapanPct = (int) round(($pribadiPct + $keluargaPct + $pendidikanPct) / 3);
                $semuaLengkap = $pribadiSelesai && $keluargaSelesai;
            @endphp


            <div class="pmb-card flex flex-col justify-between lg:col-span-6">
                <div>
                    <div class="mb-4 flex items-start justify-between gap-3">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Kelengkapan Profil</h2>
                            <p class="text-xs text-slate-500">Lengkapi profil Anda untuk melanjutkan proses pendaftaran</p>
                        </div>
                        <div class="pmb-progress-circle">{{ $totalKelengkapanPct }}%</div>
                    </div>

                    <div class="space-y-2.5">
                        <a href="{{ route('profile.edit') }}" class="block rounded-xl border {{ $pribadiSelesai ? 'border-emerald-200/90 hover:border-emerald-300' : 'border-slate-200/80 hover:border-slate-300' }} bg-slate-50/40 p-3 transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg {{ $pribadiSelesai ? 'bg-emerald-100 text-sm text-emerald-700' : 'pmb-icon-blue' }}">&#128100;</span>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Data Pribadi</div>
                                        <div class="text-[10px] font-semibold uppercase tracking-wide {{ $pribadiSelesai ? 'text-emerald-700' : ($pribadiPct > 0 ? 'text-amber-600' : 'text-slate-400') }}">
                                            {{ $pribadiSelesai ? 'Selesai' : ($pribadiPct > 0 ? 'Sebagian (' . $pribadiTerisi . '/' . count($pribadiFields) . ')' : 'Belum dilengkapi') }}
                                        </div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold {{ $pribadiSelesai ? 'text-emerald-700' : ($pribadiPct > 0 ? 'text-amber-600' : 'text-slate-400') }}">{{ $pribadiPct }}%</span>
                            </div>
                            <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                <div class="h-full rounded-full bg-emerald-500 transition-all" style="width: {{ $pribadiPct }}%;"></div>
                            </div>
                        </a>

                        <a href="{{ route('keluarga.index') }}" class="block rounded-xl border {{ $keluargaSelesai ? 'border-emerald-200/90 hover:border-emerald-300' : 'border-slate-200/80 hover:border-slate-300' }} bg-slate-50/40 p-3 transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg {{ $keluargaSelesai ? 'bg-emerald-100 text-sm text-emerald-700' : 'pmb-icon-blue' }}">&#128106;</span>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Data Keluarga</div>
                                        <div class="text-[10px] font-semibold uppercase tracking-wide {{ $keluargaSelesai ? 'text-emerald-700' : 'text-slate-400' }}">
                                            {{ $keluargaSelesai ? 'Selesai (' . $keluargaCount . ' data)' : 'Belum ditambahkan' }}
                                        </div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold {{ $keluargaSelesai ? 'text-emerald-700' : 'text-slate-400' }}">{{ $keluargaPct }}%</span>
                            </div>
                            <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                <div class="h-full rounded-full bg-emerald-500 transition-all" style="width: {{ $keluargaPct }}%;"></div>
                            </div>
                        </a>

                        <a href="{{ route('pendidikan.index') }}" class="block rounded-xl border {{ $pendidikanSelesai ? 'border-emerald-200/90 hover:border-emerald-300' : 'border-slate-200/80 hover:border-slate-300' }} bg-slate-50/40 p-3 transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg {{ $pendidikanSelesai ? 'bg-emerald-100 text-sm text-emerald-700' : 'pmb-icon-blue' }}">&#127891;</span>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Riwayat Pendidikan</div>
                                        <div class="text-[10px] font-semibold uppercase tracking-wide {{ $pendidikanSelesai ? 'text-emerald-700' : 'text-slate-400' }}">
                                            {{ $pendidikanSelesai ? 'Selesai (' . $pendidikanCount . ' data)' : 'Belum ditambahkan' }}
                                        </div>
                                    </div>
                                </div>
                                <span class="text-xs font-bold {{ $pendidikanSelesai ? 'text-emerald-700' : 'text-slate-400' }}">{{ $pendidikanPct }}%</span>
                            </div>
                            <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                <div class="h-full rounded-full bg-emerald-500 transition-all" style="width: {{ $pendidikanPct }}%;"></div>
                            </div>
                        </a>

                        <button type="button" onclick="bukaModalFoto()" class="block w-full text-left rounded-xl border {{ !empty($pathFoto) ? 'border-emerald-200/90 hover:border-emerald-300' : 'border-slate-200/80 hover:border-slate-300' }} bg-slate-50/40 p-3 transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <span class="flex h-8 w-8 items-center justify-center rounded-lg {{ !empty($pathFoto) ? 'bg-emerald-100 text-sm text-emerald-700' : 'pmb-icon-blue' }}">&#128247;</span>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800">Foto Profil</div>
                                        <div class="text-[10px] font-semibold uppercase tracking-wide {{ !empty($pathFoto) ? 'text-emerald-600' : 'text-slate-400' }}">{{ !empty($pathFoto) ? 'Sudah diupload' : 'Belum diupload' }}</div>
                                    </div>
                                </div>
                                <span class="text-xs font-semibold {{ !empty($pathFoto) ? 'text-emerald-600' : 'text-slate-400' }}">{{ !empty($pathFoto) ? '100%' : '0%' }}</span>
                            </div>
                            <div class="mt-2 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                <div class="h-full rounded-full bg-emerald-500 transition-all" style="width: {{ !empty($pathFoto) ? '100%' : '0%' }};"></div>
                            </div>
                        </button>
                    </div>
                </div>

                @if ($semuaLengkap)
                    <div class="mt-4 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50/70 p-3">
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-bold text-emerald-700">&#10003;</span>
                        <div>
                            <div class="text-xs font-bold text-emerald-900">Data Pribadi &amp; Keluarga Lengkap</div>
                            <div class="text-[11px] text-emerald-700">Anda dapat melanjutkan pengisian pendidikan, foto profil, dan pilihan prodi</div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('profile.edit') }}" class="mt-4 flex items-center gap-3 rounded-xl border border-amber-200 bg-amber-50/60 p-3 transition hover:bg-amber-50">
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-xs font-bold text-amber-700">!</span>
                        <div>
                            <div class="text-xs font-bold text-amber-900">Profil Belum Lengkap</div>
                            <div class="text-[11px] text-amber-700">Klik untuk melengkapi data pribadi, keluarga, pendidikan, dan foto profil</div>
                        </div>
                    </a>
                @endif
            </div>
        </section>

        <div>
            <div class="pmb-tab-head">
                <span>&#9200;</span>
                <span>PMB IPWIJA 2026/2027</span>
            </div>

            <div class="pmb-tab-body">
                <div class="mb-4 flex items-center justify-between text-xs text-slate-500">
                    <div>Periode: <span class="font-semibold text-slate-700">2026/2027</span></div>
                    <span class="pmb-pill-blue">
                        <span style="width:6px;height:6px;border-radius:9999px;background-color:#08467d;"></span>
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

                <div class="mt-6">
                    <div class="mb-3 flex items-center gap-2">
                        <span class="text-sm" style="color:#08467d;">&#127891;</span>
                        <div class="flex flex-wrap items-center justify-between gap-2 w-full">
                            <h3 class="text-sm font-bold text-slate-900">Pilihan Program Studi</h3>
                            <a
                                href="{{ route('program-studi.index') }}"
                                class="inline-flex items-center gap-1 rounded-lg border border-[#08467d] bg-white px-3 py-1.5 text-[11px] font-semibold text-[#08467d] hover:bg-[#08467d] hover:text-white transition"
                            >
                                {{ $user->pilihan_prodi ? 'Ubah Pilihan Prodi' : 'Pilih Program Studi' }}
                            </a>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="mb-3 rounded-lg border border-emerald-200 bg-emerald-50 px-3.5 py-2 text-xs font-medium text-emerald-800">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto rounded-lg border border-slate-200">
                        <table class="w-full text-left text-xs">
                            <thead class="pmb-table-head">
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
                                        <span class="inline-flex h-5 w-5 items-center justify-center rounded-full text-[11px] font-bold" style="background-color:#dbeafe;color:#08467d;">1</span>
                                    </td>
                                    <td class="px-3.5 py-3 text-slate-700">{{ $user->fakultas ?: '-' }}</td>
                                    <td class="px-3.5 py-3 text-slate-700">{{ $user->program_pendidikan ?: '-' }}</td>
                                    <td class="px-3.5 py-3 font-semibold text-slate-900">
                                        {{ $user->pilihan_prodi ?: 'Belum dipilih' }}
                                    </td>
                                    <td class="px-3.5 py-3 {{ $user->sistem_kuliah ? 'text-emerald-700 font-medium' : 'text-slate-400' }}">
                                        {{ $user->sistem_kuliah ? 'Sistem Kuliah: ' . $user->sistem_kuliah : 'Menunggu pemilihan' }}
                                    </td>
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

        <section class="pmb-card">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Progres Pendaftaran</h2>
                    <p class="text-xs text-slate-500">Pelengkapan data &amp; tahapan pendaftaran</p>
                </div>
                <div class="text-right">
                    <div class="text-xl font-extrabold" style="color:#08467d;">20%</div>
                    <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Selesai</div>
                </div>
            </div>

            <div class="mt-3 h-2 w-full overflow-hidden rounded-full bg-slate-100">
                <div class="h-full w-1/5 rounded-full" style="background-color:#08467d;"></div>
            </div>

            <div class="mt-4 flex flex-wrap items-center justify-between gap-3 rounded-xl border border-slate-200/70 bg-slate-50/60 px-4 py-3">
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-700">
                    <span style="width:8px;height:8px;border-radius:9999px;background-color:#08467d;display:inline-block;"></span>
                    <span>Pemilihan Program Studi</span>
                </div>
                <a href="{{ route('profile.edit') }}" class="pmb-btn-primary">
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

                    <div class="pmb-step-active flex items-center justify-between rounded-xl px-4 py-3">
                        <div class="flex items-center gap-3">
                            <span class="pmb-step-num-active">2</span>
                            <div>
                                <div class="text-xs font-bold text-slate-800 sm:text-sm">Pemilihan Program Studi &amp; Data Tambahan</div>
                                <div class="text-xs text-slate-500">Lengkapi biodata, keluarga, pendidikan, dan pilihan prodi</div>
                            </div>
                        </div>
                        <span class="pmb-step-badge-active">Sedang Berlangsung</span>
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
                </div>
            </div>
        </section>
    </main>
</body>
</html>

    <div id="modalUploadFoto" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4 backdrop-blur-[1px]">
        <div class="max-h-[90vh] w-full max-w-md overflow-y-auto rounded-2xl border border-slate-200 bg-white p-5 shadow-xl">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Upload Foto Calon Mahasiswa</h3>
                    <p class="text-[11px] text-slate-500">Format JPG, JPEG, PNG, atau WEBP (maks. 2 MB)</p>
                </div>
                <button type="button" onclick="tutupModalFoto()" class="rounded-lg px-2 py-1 text-xs font-semibold text-slate-400 hover:bg-slate-100 hover:text-slate-700">&times;</button>
            </div>

            <form action="{{ route('dashboard.foto.update') }}" method="POST" enctype="multipart/form-data" class="mt-4 space-y-4">
                @csrf

                <div class="flex items-center gap-4 rounded-xl border border-slate-200 bg-slate-50 p-3.5">
                    <div class="flex h-20 w-20 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-white">
                        @if (!empty($pathFoto))
                            <img id="previewFotoImg" src="{{ asset('storage/' . $pathFoto) }}" alt="Preview Foto" class="h-full w-full object-cover">
                            <span id="previewFotoInisial" class="hidden text-lg font-bold text-[#08467d]">{{ $inisial }}</span>
                        @else
                            <img id="previewFotoImg" src="" alt="Preview Foto" class="hidden h-full w-full object-cover">
                            <span id="previewFotoInisial" class="text-lg font-bold text-[#08467d]">{{ $inisial }}</span>
                        @endif
                    </div>
                    <div class="min-w-0 flex-1">
                        <label for="inputFotoCalon" class="block text-xs font-semibold text-slate-800">Pilih File Foto</label>
                        <input
                            id="inputFotoCalon"
                            type="file"
                            name="foto"
                            accept="image/jpeg,image/png,image/webp"
                            required
                            onchange="previewFotoDipilih(this)"
                            class="mt-1.5 block w-full text-[11px] text-slate-600 file:mr-2.5 file:rounded-lg file:border-0 file:bg-[#08467d] file:px-3 file:py-1.5 file:text-[11px] file:font-semibold file:text-white hover:file:bg-[#063661]"
                        >
                        @error('foto')
                            <p class="mt-1 text-[11px] font-medium text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 pt-1">
                    <button type="button" onclick="tutupModalFoto()" class="rounded-lg border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                        Batal
                    </button>
                    <button type="submit" style="background-color: #08467d; color: #ffffff;" class="rounded-lg bg-[#08467d] px-4 py-2 text-xs font-semibold text-white hover:bg-[#063661]">
                        Simpan Foto
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function bukaModalFoto() {
            const modal = document.getElementById('modalUploadFoto');
            if (!modal) return;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function tutupModalFoto() {
            const modal = document.getElementById('modalUploadFoto');
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function previewFotoDipilih(input) {
            const img = document.getElementById('previewFotoImg');
            const inisial = document.getElementById('previewFotoInisial');
            if (!input.files || !input.files[0]) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                if (img) {
                    img.src = e.target.result;
                    img.classList.remove('hidden');
                }
                if (inisial) {
                    inisial.classList.add('hidden');
                }
            };
            reader.readAsDataURL(input.files[0]);
        }

        @error('foto')
        document.addEventListener('DOMContentLoaded', function () {
            bukaModalFoto();
        });
        @enderror
    </script>
