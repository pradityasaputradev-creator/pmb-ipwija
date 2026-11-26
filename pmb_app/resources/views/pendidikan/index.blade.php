<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pendidikan - PMB Universitas IPWIJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #eef3f8;
            color: #1e293b;
        }
        .pmb-header { background-color: #08467d; color: #ffffff; }
        .pmb-container { max-width: 1020px; margin: 0 auto; padding: 0 24px; }
        .pmb-topbar {
            display: flex; align-items: center; justify-content: space-between;
            gap: 16px; padding: 16px 0; border-bottom: 1px solid rgba(255, 255, 255, 0.14); flex-wrap: wrap;
        }
        .pmb-brand { display: flex; align-items: center; gap: 12px; }
        .pmb-logo-img {
            width: 42px; height: 42px; border-radius: 9999px; object-fit: contain;
            background-color: #ffffff; padding: 2px; flex-shrink: 0;
        }
        .pmb-logo-fallback {
            width: 42px; height: 42px; border-radius: 9999px; background-color: #ffffff;
            color: #08467d; font-size: 10px; font-weight: 800; display: none;
            align-items: center; justify-content: center; flex-shrink: 0;
        }
        .pmb-univ-title { font-size: 17px; font-weight: 800; letter-spacing: 0.02em; color: #ffffff; line-height: 1.2; }
        .pmb-univ-sub { font-size: 11.5px; color: #dbeafe; margin-top: 2px; }
        .pmb-nav-actions { display: flex; align-items: center; gap: 8px; }
        .pmb-btn-nav {
            display: inline-flex; align-items: center; gap: 6px; padding: 6px 13px; border-radius: 6px;
            background-color: #125894; border: 1px solid rgba(255, 255, 255, 0.22); color: #ffffff;
            font-size: 12px; font-weight: 600; text-decoration: none; cursor: pointer;
        }
        .pmb-btn-nav:hover { background-color: #1969ae; }
        .pmb-hero-sub {
            display: flex; align-items: flex-end; justify-content: space-between;
            gap: 16px; padding: 15px 0 20px; flex-wrap: wrap;
        }
        .pmb-breadcrumb { font-size: 11.5px; color: #bfdbfe; }
        .pmb-breadcrumb strong { color: #ffffff; font-weight: 700; }
        .pmb-page-title { margin: 5px 0 3px; font-size: 26px; font-weight: 800; color: #ffffff; line-height: 1.2; }
        .pmb-student-line { margin: 0; font-size: 12.5px; color: #e0f2fe; }
        .pmb-student-line strong { color: #ffffff; font-weight: 700; }
        .pmb-status-pill {
            display: inline-block; padding: 6px 14px; border-radius: 6px; background-color: #125894;
            border: 1px solid rgba(255, 255, 255, 0.22); color: #ffffff; font-size: 12px; font-weight: 600;
        }
        .pmb-status-pill.has-data {
            background-color: rgba(16, 185, 129, 0.25); border-color: rgba(110, 231, 183, 0.5); color: #ecfdf5;
        }
        .pmb-main { max-width: 1020px; margin: 0 auto; padding: 22px 24px 36px; }
        .pmb-alert-success {
            background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46;
            padding: 11px 15px; border-radius: 8px; font-size: 12.5px; font-weight: 600; margin-bottom: 16px;
        }
        .pmb-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 22px; align-items: start; }
        @media (max-width: 860px) { .pmb-grid { grid-template-columns: 1fr; } }
        .pmb-card {
            background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px;
            padding: 20px 22px; box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }
        .pmb-card-title { margin: 0; font-size: 18px; font-weight: 800; color: #0f172a; }
        .pmb-card-desc { margin: 4px 0 0; font-size: 12.5px; color: #64748b; line-height: 1.45; }
        .pmb-form-stack { margin-top: 16px; display: flex; flex-direction: column; gap: 13px; }
        .pmb-label { display: block; font-size: 12.5px; font-weight: 700; color: #1e293b; margin-bottom: 5px; }
        .pmb-input, .pmb-select {
            width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 6px;
            font-size: 13.5px; color: #0f172a; background-color: #ffffff;
        }
        .pmb-input:focus, .pmb-select:focus {
            outline: none; border-color: #08467d; box-shadow: 0 0 0 3px rgba(8, 70, 125, 0.15);
        }
        .pmb-hint { margin: 4px 0 0; font-size: 11px; color: #64748b; }
        .pmb-field-error { margin: 4px 0 0; font-size: 11.5px; color: #dc2626; font-weight: 600; }
        .pmb-form-actions { display: flex; align-items: center; gap: 8px; margin-top: 4px; flex-wrap: wrap; }
        .pmb-btn-primary {
            padding: 9px 16px; border-radius: 6px; background-color: #08467d; border: 1px solid #08467d;
            color: #ffffff; font-size: 11.5px; font-weight: 800; letter-spacing: 0.04em;
            text-transform: uppercase; cursor: pointer;
        }
        .pmb-btn-primary:hover { background-color: #063661; }
        .pmb-btn-secondary {
            padding: 8px 14px; border-radius: 6px; background-color: #ffffff; border: 1px solid #cbd5e1;
            color: #334155; font-size: 12px; font-weight: 600; text-decoration: none; display: inline-block;
        }
        .pmb-btn-secondary:hover { background-color: #f8fafc; }
        .pmb-empty-box {
            margin-top: 16px; border: 1px dashed #cbd5e1; border-radius: 8px;
            padding: 28px 18px; text-align: center; background-color: #fafbfd;
        }
        .pmb-empty-title { margin: 0; font-size: 13.5px; font-weight: 700; color: #334155; }
        .pmb-empty-desc { margin: 4px 0 0; font-size: 12px; color: #64748b; }
        .pmb-list { margin-top: 16px; display: flex; flex-direction: column; gap: 10px; }
        .pmb-list-item {
            display: flex; align-items: center; justify-content: space-between; gap: 12px;
            padding: 12px 14px; border: 1px solid #e2e8f0; border-radius: 8px; background-color: #ffffff;
        }
        .pmb-item-name { font-size: 14px; font-weight: 700; color: #0f172a; }
        .pmb-item-meta { font-size: 12px; color: #64748b; margin-top: 2px; }
        .pmb-item-actions { display: flex; align-items: center; gap: 6px; flex-shrink: 0; }
        .pmb-btn-edit {
            padding: 5px 10px; border-radius: 5px; border: 1px solid #cbd5e1; background-color: #ffffff;
            color: #1e293b; font-size: 11.5px; font-weight: 600; text-decoration: none;
        }
        .pmb-btn-edit:hover { background-color: #f1f5f9; }
        .pmb-btn-delete {
            padding: 5px 10px; border-radius: 5px; border: 1px solid #fecaca; background-color: #fef2f2;
            color: #b91c1c; font-size: 11.5px; font-weight: 600; cursor: pointer;
        }
        .pmb-btn-delete:hover { background-color: #fee2e2; }
    
        input::placeholder, select::placeholder { color: #94a3b8; font-size: 13px; opacity: 1; }
    </style>
</head>
<body>
    @php
        $isEdit = isset($pendidikanEdit) && $pendidikanEdit !== null;
        $jenjangOptions = ['SMA', 'SMK', 'MA', 'Paket C / Sederajat', 'D1/D2/D3', 'D4/S1'];
        $selectedJenjang = old('jenjang', $isEdit ? $pendidikanEdit->jenjang : 'SMK');
    @endphp

    <header class="pmb-header">
        <div class="pmb-container">
            <div class="pmb-topbar">
                <div class="pmb-brand">
                    <img
                        src="{{ asset('images/logo-ipwija-header.png') }}"
                        alt="Logo Universitas IPWIJA"
                        class="pmb-logo-img"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                    >
                    <div id="pmbLogoFallback" class="pmb-logo-fallback">IPWIJA</div>
                    <div>
                        <div class="pmb-univ-title">UNIVERSITAS IPWIJA</div>
                        <div class="pmb-univ-sub">Portal Calon Mahasiswa - Tahun Akademik 2026/2027</div>
                    </div>
                </div>

                <div class="pmb-nav-actions">
                    <a href="{{ route('dashboard') }}" class="pmb-btn-nav">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                        @csrf
                        <button type="submit" class="pmb-btn-nav">Keluar</button>
                    </form>
                </div>
            </div>

            <div class="pmb-hero-sub">
                <div>
                    <div class="pmb-breadcrumb">PMB Online &rsaquo; Dashboard &rsaquo; <strong>Riwayat Pendidikan</strong></div>
                    <h1 class="pmb-page-title">Riwayat Pendidikan</h1>
                </div>

                <div class="pmb-status-pill {{ $daftarPendidikan->count() > 0 ? 'has-data' : '' }}">
                    {{ $daftarPendidikan->count() > 0 ? $daftarPendidikan->count() . ' Riwayat Tersimpan' : 'Belum Ada Data' }}
                </div>
            </div>
        </div>
    </header>

    <main class="pmb-main">
        @if (session('pendidikan_status'))
            <div class="pmb-alert-success">
                {{ session('pendidikan_status') }}
            </div>
        @endif

        <div class="pmb-grid">
            <section class="pmb-card">
                <h2 class="pmb-card-title">{{ $isEdit ? 'Edit Riwayat Pendidikan' : 'Tambah Riwayat Pendidikan' }}</h2>
                <p class="pmb-card-desc">
                    {{ $isEdit ? 'Perbarui data sekolah atau perguruan tinggi yang dipilih.' : 'Lengkapi riwayat pendidikan SMA/SMK/MA atau sederajat beserta tahun kelulusan.' }}
                </p>

                <form
                    method="POST"
                    action="{{ $isEdit ? route('pendidikan.update', $pendidikanEdit) : route('pendidikan.store') }}"
                    class="pmb-form-stack"
                >
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @endif

                    <div>
                        <label for="jenjang" class="pmb-label">Jenjang Pendidikan</label>
                        <select id="jenjang" name="jenjang" class="pmb-select" required>
                            @foreach ($jenjangOptions as $opt)
                                <option value="{{ $opt }}" {{ $selectedJenjang === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                        </select>
                        @error('jenjang')
                            <p class="pmb-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama_sekolah" class="pmb-label">Nama Sekolah / Institusi</label>
                        <input
                            id="nama_sekolah"
                            name="nama_sekolah"
                            type="text"
                            value="{{ old('nama_sekolah', $isEdit ? $pendidikanEdit->nama_sekolah : '') }}"
                            placeholder="Nama sekolah / kampus"
                            class="pmb-input"
                            required
                        >
                        @error('nama_sekolah')
                            <p class="pmb-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jurusan" class="pmb-label">Jurusan / Program Keahlian</label>
                        <input
                            id="jurusan"
                            name="jurusan"
                            type="text"
                            value="{{ old('jurusan', $isEdit ? $pendidikanEdit->jurusan : '') }}"
                            placeholder="Jurusan / program keahlian"
                            class="pmb-input"
                        >
                        <p class="pmb-hint">Opsional, kosongkan jika tidak ada jurusan khusus.</p>
                        @error('jurusan')
                            <p class="pmb-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tahun_lulus" class="pmb-label">Tahun Lulus</label>
                        <input
                            id="tahun_lulus"
                            name="tahun_lulus"
                            type="number"
                            min="1970"
                            max="{{ (int) date('Y') + 1 }}"
                            value="{{ old('tahun_lulus', $isEdit ? $pendidikanEdit->tahun_lulus : '') }}"
                            placeholder="Tahun lulus (mis. 2024)"
                            class="pmb-input"
                            required
                        >
                        @error('tahun_lulus')
                            <p class="pmb-field-error">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="pmb-form-actions">
                        <button type="submit" class="pmb-btn-primary">
                            {{ $isEdit ? 'PERBARUI DATA' : 'SIMPAN DATA' }}
                        </button>

                        @if ($isEdit)
                            <a href="{{ route('pendidikan.index') }}" class="pmb-btn-secondary">Batal</a>
                        @endif
                    </div>
                </form>
            </section>

            <section class="pmb-card">
                <h2 class="pmb-card-title">Daftar Riwayat Pendidikan</h2>
                <p class="pmb-card-desc">Riwayat pendidikan yang tercatat untuk akun calon mahasiswa ini.</p>

                @if ($daftarPendidikan->isEmpty())
                    <div class="pmb-empty-box">
                        <p class="pmb-empty-title">Belum ada data riwayat pendidikan</p>
                        <p class="pmb-empty-desc">Tambahkan data sekolah asal Anda pada formulir di samping.</p>
                    </div>
                @else
                    <div class="pmb-list">
                        @foreach ($daftarPendidikan as $item)
                            <div class="pmb-list-item">
                                <div>
                                    <div class="pmb-item-name">{{ $item->jenjang }} &mdash; {{ $item->nama_sekolah }}</div>
                                    <div class="pmb-item-meta">
                                        Lulus {{ $item->tahun_lulus }}
                                        @if ($item->jurusan)
                                            &bull; {{ $item->jurusan }}
                                        @endif
                                    </div>
                                </div>

                                <div class="pmb-item-actions">
                                    <a href="{{ route('pendidikan.index', ['edit' => $item->id]) }}" class="pmb-btn-edit">Edit</a>
                                    <form method="POST" action="{{ route('pendidikan.destroy', $item) }}" style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="pmb-btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        </div>
    </main>
</body>
</html>
