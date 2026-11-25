<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pribadi - PMB Universitas IPWIJA</title>
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
            flex-wrap: wrap;
        }
        .pmb-brand {
            display: flex;
            align-items: center;
            gap: 12px;
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
        .pmb-logo-fallback {
            width: 42px;
            height: 42px;
            border-radius: 9999px;
            background-color: #ffffff;
            color: #08467d;
            font-size: 10px;
            font-weight: 800;
            display: none;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .pmb-univ-title {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: 0.02em;
            color: #ffffff;
            line-height: 1.2;
        }
        .pmb-univ-sub {
            font-size: 11.5px;
            color: #dbeafe;
            margin-top: 2px;
        }
        .pmb-nav-actions {
            display: flex;
            align-items: center;
            gap: 8px;
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
        .pmb-hero-sub {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            padding: 15px 0 20px;
            flex-wrap: wrap;
        }
        .pmb-breadcrumb {
            font-size: 11.5px;
            color: #bfdbfe;
        }
        .pmb-breadcrumb strong {
            color: #ffffff;
            font-weight: 700;
        }
        .pmb-page-title {
            margin: 5px 0 3px;
            font-size: 26px;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.2;
        }
        .pmb-student-line {
            margin: 0;
            font-size: 12.5px;
            color: #e0f2fe;
        }
        .pmb-student-line strong {
            color: #ffffff;
            font-weight: 700;
        }
        .pmb-status-pill {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 6px;
            background-color: #125894;
            border: 1px solid rgba(255, 255, 255, 0.22);
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
        }
        .pmb-status-pill.is-complete {
            background-color: rgba(16, 185, 129, 0.25);
            border-color: rgba(110, 231, 183, 0.5);
            color: #ecfdf5;
        }
        .pmb-main {
            max-width: 1020px;
            margin: 0 auto;
            padding: 22px 24px 36px;
        }
        .pmb-alert-success {
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 11px 15px;
            border-radius: 8px;
            font-size: 12.5px;
            font-weight: 600;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
        .pmb-alert-error {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 11px 15px;
            border-radius: 8px;
            font-size: 12.5px;
            margin-bottom: 16px;
        }
        .pmb-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
            align-items: start;
        }
        @media (max-width: 860px) {
            .pmb-grid {
                grid-template-columns: 1fr;
            }
        }
        .pmb-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px 22px;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }
        .pmb-card-title {
            margin: 0;
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
        }
        .pmb-card-desc {
            margin: 4px 0 0;
            font-size: 12.5px;
            color: #64748b;
            line-height: 1.45;
        }
        .pmb-form-stack {
            margin-top: 14px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .pmb-row-2 {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }
        @media (max-width: 560px) {
            .pmb-row-2 {
                grid-template-columns: 1fr;
            }
        }
        .pmb-label {
            display: block;
            font-size: 12.5px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 4px;
        }
        .pmb-input, .pmb-textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 13.5px;
            color: #0f172a;
            background-color: #ffffff;
        }
        .pmb-input:focus, .pmb-textarea:focus {
            outline: none;
            border-color: #08467d;
            box-shadow: 0 0 0 3px rgba(8, 70, 125, 0.15);
        }
        .pmb-hint {
            margin: 4px 0 0;
            font-size: 11px;
            color: #64748b;
        }
        .pmb-field-error {
            margin: 4px 0 0;
            font-size: 11.5px;
            color: #dc2626;
            font-weight: 600;
        }
        .pmb-form-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 4px;
            flex-wrap: wrap;
        }
        .pmb-btn-primary {
            padding: 9px 16px;
            border-radius: 6px;
            background-color: #08467d;
            border: 1px solid #08467d;
            color: #ffffff;
            font-size: 11.5px;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            cursor: pointer;
        }
        .pmb-btn-primary:hover {
            background-color: #063560;
        }
        .pmb-btn-secondary {
            display: inline-flex;
            align-items: center;
            padding: 8px 14px;
            border-radius: 6px;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            color: #334155;
            font-size: 12.5px;
            font-weight: 600;
            text-decoration: none;
        }
        .pmb-btn-secondary:hover {
            background-color: #f8fafc;
        }
        .pmb-summary-box {
            margin-top: 14px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background-color: #f8fafc;
            padding: 2px 14px;
        }
        .pmb-summary-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 14px;
            padding: 9.5px 0;
            border-bottom: 1px solid #e2e8f0;
            font-size: 12.5px;
        }
        .pmb-summary-row:last-child {
            border-bottom: none;
        }
        .pmb-summary-key {
            color: #64748b;
            font-weight: 500;
            flex-shrink: 0;
        }
        .pmb-summary-val {
            color: #0f172a;
            font-weight: 700;
            text-align: right;
            word-break: break-word;
        }
        .pmb-summary-block {
            padding: 9.5px 0;
            font-size: 12.5px;
        }
        .pmb-summary-block .pmb-summary-val {
            text-align: left;
            margin-top: 4px;
            line-height: 1.45;
        }
    </style>
</head>
<body>
    @php
        $isComplete = filled($user->name) && filled($user->email) && filled($user->nik) && filled($user->tanggal_lahir) && filled($user->no_hp) && filled($user->alamat);
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
                    <div class="pmb-logo-fallback">IPWIJA</div>
                    <div>
                        <div class="pmb-univ-title">UNIVERSITAS IPWIJA</div>
                        <div class="pmb-univ-sub">Portal Calon Mahasiswa - Tahun Akademik 2026/2027</div>
                    </div>
                </div>

                <div class="pmb-nav-actions">
                    <a href="{{ route('dashboard') }}" class="pmb-btn-nav">
                        <span>&larr;</span>
                        <span>Dashboard</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                        @csrf
                        <button type="submit" class="pmb-btn-nav">Keluar</button>
                    </form>
                </div>
            </div>

            <div class="pmb-hero-sub">
                <div>
                    <div class="pmb-breadcrumb">
                        Alur PMB: <strong>Biodata</strong> &rarr; Data Keluarga &rarr; Berkas &amp; Seleksi
                    </div>
                    <h1 class="pmb-page-title">Data Pribadi</h1>
                    <p class="pmb-student-line">
                        Calon Mahasiswa: <strong>{{ $user->name }}</strong>
                    </p>
                </div>

                <div>
                    @if ($isComplete)
                        <span class="pmb-status-pill is-complete">Biodata Lengkap</span>
                    @else
                        <span class="pmb-status-pill">Perlu Dilengkapi</span>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <main class="pmb-main">
        @if (session('status') === 'profile-updated')
            <div class="pmb-alert-success">
                <span>Data pribadi berhasil disimpan</span>
                <a href="{{ route('dashboard') }}" style="color:#065f46;font-weight:700;text-decoration:underline;">Kembali ke Dashboard</a>
            </div>
        @endif

        @if ($errors->any())
            <div class="pmb-alert-error">
                <div style="font-weight:700;">Periksa kembali data yang diinput:</div>
                <ul style="margin:6px 0 0;padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="pmb-grid">
            <section class="pmb-card">
                <h2 class="pmb-card-title">Lengkapi Data Pribadi</h2>
                <p class="pmb-card-desc">
                    Pastikan identitas dan kontak sesuai dokumen resmi pendaftaran. Perubahan akan langsung tersimpan ke akun calon mahasiswa.
                </p>

                <form method="POST" action="{{ route('profile.update') }}" class="pmb-form-stack">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="name" class="pmb-label">Nama Lengkap</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $user->name) }}"
                            required
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap sesuai KTP / ijazah"
                            class="pmb-input"
                        >
                        @error('name')
                            <p class="pmb-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pmb-row-2">
                        <div>
                            <label for="email" class="pmb-label">Alamat Email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                autocomplete="username"
                                placeholder="nama@email.com"
                                class="pmb-input"
                            >
                            @error('email')
                                <p class="pmb-field-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="no_hp" class="pmb-label">No. HP / Telepon</label>
                            <input
                                id="no_hp"
                                name="no_hp"
                                type="text"
                                maxlength="20"
                                value="{{ old('no_hp', $user->no_hp) }}"
                                placeholder="Contoh: 081234567890"
                                class="pmb-input"
                            >
                            <p class="pmb-hint">Nomor kontak aktif untuk keperluan konfirmasi administrasi PMB.</p>
                            @error('no_hp')
                                <p class="pmb-field-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="pmb-row-2">
                        <div>
                            <label for="nik" class="pmb-label">No. Identitas (NIK)</label>
                            <input
                                id="nik"
                                name="nik"
                                type="text"
                                maxlength="20"
                                value="{{ old('nik', $user->nik) }}"
                                placeholder="16 digit NIK sesuai KTP / KK"
                                class="pmb-input"
                            >
                            @error('nik')
                                <p class="pmb-field-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tanggal_lahir" class="pmb-label">Tanggal Lahir</label>
                            <input
                                id="tanggal_lahir"
                                name="tanggal_lahir"
                                type="date"
                                value="{{ old('tanggal_lahir', optional($user->tanggal_lahir)->format('Y-m-d')) }}"
                                class="pmb-input"
                            >
                            @error('tanggal_lahir')
                                <p class="pmb-field-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="alamat" class="pmb-label">Alamat Lengkap</label>
                        <textarea
                            id="alamat"
                            name="alamat"
                            rows="2"
                            maxlength="1000"
                            placeholder="Masukkan alamat lengkap sesuai domisili atau KTP"
                            class="pmb-textarea"
                        >{{ old('alamat', $user->alamat) }}</textarea>
                        @error('alamat')
                            <p class="pmb-field-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pmb-form-actions">
                        <button type="submit" class="pmb-btn-primary">Simpan Data Pribadi</button>
                        <a href="{{ route('dashboard') }}" class="pmb-btn-secondary">Kembali ke Dashboard</a>
                    </div>
                </form>
            </section>

            <section class="pmb-card">
                <h2 class="pmb-card-title">Ringkasan Data Tersimpan</h2>
                <p class="pmb-card-desc">
                    Data di bawah ini menampilkan informasi biodata yang tersimpan pada akun Anda.
                </p>

                <div class="pmb-summary-box">
                    <div class="pmb-summary-row">
                        <span class="pmb-summary-key">Nama Lengkap</span>
                        <span class="pmb-summary-val">{{ $user->name ?: 'Belum diisi' }}</span>
                    </div>
                    <div class="pmb-summary-row">
                        <span class="pmb-summary-key">Email</span>
                        <span class="pmb-summary-val">{{ $user->email ?: 'Belum diisi' }}</span>
                    </div>
                    <div class="pmb-summary-row">
                        <span class="pmb-summary-key">No. Identitas (NIK)</span>
                        <span class="pmb-summary-val">{{ $user->nik ?: 'Belum dilengkapi' }}</span>
                    </div>
                    <div class="pmb-summary-row">
                        <span class="pmb-summary-key">Tanggal Lahir</span>
                        <span class="pmb-summary-val">
                            {{ $user->tanggal_lahir ? $user->tanggal_lahir->translatedFormat('d F Y') : 'Belum dilengkapi' }}
                        </span>
                    </div>
                    <div class="pmb-summary-row">
                        <span class="pmb-summary-key">No. HP / Telepon</span>
                        <span class="pmb-summary-val">{{ $user->no_hp ?: 'Belum dilengkapi' }}</span>
                    </div>
                    <div class="pmb-summary-block">
                        <div class="pmb-summary-key">Alamat Lengkap</div>
                        <div class="pmb-summary-val">{{ $user->alamat ?: 'Belum dilengkapi' }}</div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
