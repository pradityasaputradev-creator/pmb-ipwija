<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Keluarga - PMB Universitas IPWIJA</title>
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
        .pmb-status-pill.has-data {
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
            margin-top: 16px;
            display: flex;
            flex-direction: column;
            gap: 13px;
        }
        .pmb-label {
            display: block;
            font-size: 12.5px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 5px;
        }
        .pmb-input, .pmb-select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 13.5px;
            color: #0f172a;
            background-color: #ffffff;
        }
        .pmb-input:focus, .pmb-select:focus {
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
        .pmb-list-stack {
            margin-top: 16px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .pmb-item-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 14px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background-color: #f8fafc;
            flex-wrap: wrap;
        }
        .pmb-item-rel {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 5px;
            background-color: #dbeafe;
            color: #08467d;
            font-size: 11px;
            font-weight: 800;
        }
        .pmb-item-name {
            font-size: 13.5px;
            font-weight: 700;
            color: #0f172a;
            margin-left: 6px;
        }
        .pmb-item-hp {
            margin: 4px 0 0;
            font-size: 12px;
            color: #475569;
        }
        .pmb-item-actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .pmb-btn-edit {
            display: inline-flex;
            align-items: center;
            padding: 6px 11px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            background-color: #ffffff;
            color: #334155;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }
        .pmb-btn-edit:hover {
            background-color: #f1f5f9;
        }
        .pmb-btn-delete {
            display: inline-flex;
            align-items: center;
            padding: 6px 11px;
            border-radius: 6px;
            border: 1px solid #fecaca;
            background-color: #fef2f2;
            color: #b91c1c;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }
        .pmb-btn-delete:hover {
            background-color: #fee2e2;
        }
        .pmb-empty-box {
            margin-top: 16px;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            background-color: #f8fafc;
            padding: 24px 16px;
            text-align: center;
        }
    </style>
</head>
<body>
    @php
        $user = auth()->user();
        $namaUser = $user?->name ?? 'Calon Mahasiswa';
        $isEditing = isset($keluargaEdit) && $keluargaEdit !== null;
        $hubunganTerpilih = old('hubungan_keluarga', $keluargaEdit->hubungan ?? 'Ayah');
        $jumlahData = isset($daftarKeluarga) ? $daftarKeluarga->count() : 0;
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
                        Alur PMB: Biodata &rarr; <strong>Data Keluarga</strong> &rarr; Berkas &amp; Seleksi
                    </div>
                    <h1 class="pmb-page-title">Data Keluarga</h1>
                    <p class="pmb-student-line">
                        Calon Mahasiswa: <strong>{{ $namaUser }}</strong>
                    </p>
                </div>

                <div>
                    <span class="pmb-status-pill {{ $jumlahData > 0 ? 'has-data' : '' }}">
                        {{ $jumlahData > 0 ? $jumlahData . ' Data Tersimpan' : 'Belum Ada Data' }}
                    </span>
                </div>
            </div>
        </div>
    </header>

    <main class="pmb-main">
        @if (session('keluarga_status'))
            <div class="pmb-alert-success">
                {{ session('keluarga_status') }}
            </div>
        @endif

        <div class="pmb-grid">
            <section class="pmb-card">
                <h2 class="pmb-card-title">
                    {{ $isEditing ? 'Edit Data Keluarga' : 'Tambah Data Keluarga' }}
                </h2>
                <p class="pmb-card-desc">
                    Sebaiknya lengkapi data Ayah dan Ibu jika tersedia. Jika hanya ada salah satu atau wali, cukup isi yang ada.
                </p>

                <form
                    method="POST"
                    action="{{ $isEditing ? route('keluarga.update', $keluargaEdit->id) : route('keluarga.store') }}"
                    class="pmb-form-stack"
                >
                    @csrf
                    @if ($isEditing)
                        @method('PUT')
                    @endif

                    <div>
                        <label for="nama_keluarga" class="pmb-label">Nama Lengkap</label>
                        <input
                            id="nama_keluarga"
                            name="nama_keluarga"
                            type="text"
                            value="{{ old('nama_keluarga', $keluargaEdit->nama ?? '') }}"
                            placeholder="Masukkan nama lengkap orang tua atau wali"
                            required
                            autofocus
                            class="pmb-input"
                        >
                        @foreach ($errors->get('nama_keluarga') as $err)
                            <p class="pmb-field-error">{{ $err }}</p>
                        @endforeach
                    </div>

                    <div>
                        <label for="hubungan_keluarga" class="pmb-label">Hubungan</label>
                        <select
                            id="hubungan_keluarga"
                            name="hubungan_keluarga"
                            required
                            class="pmb-select"
                        >
                            <option value="Ayah" {{ $hubunganTerpilih === 'Ayah' ? 'selected' : '' }}>Ayah</option>
                            <option value="Ibu" {{ $hubunganTerpilih === 'Ibu' ? 'selected' : '' }}>Ibu</option>
                            <option value="Wali" {{ $hubunganTerpilih === 'Wali' ? 'selected' : '' }}>Wali</option>
                        </select>
                        @foreach ($errors->get('hubungan_keluarga') as $err)
                            <p class="pmb-field-error">{{ $err }}</p>
                        @endforeach
                    </div>

                    <div>
                        <label for="hp_keluarga" class="pmb-label">No. HP / Telepon</label>
                        <input
                            id="hp_keluarga"
                            name="hp_keluarga"
                            type="text"
                            value="{{ old('hp_keluarga', $keluargaEdit->hp ?? '') }}"
                            placeholder="Contoh: 081234567890"
                            class="pmb-input"
                        >
                        <p class="pmb-hint">Nomor kontak aktif untuk keperluan konfirmasi administrasi PMB.</p>
                        @foreach ($errors->get('hp_keluarga') as $err)
                            <p class="pmb-field-error">{{ $err }}</p>
                        @endforeach
                    </div>

                    <div class="pmb-form-actions">
                        <button type="submit" class="pmb-btn-primary">
                            {{ $isEditing ? 'PERBARUI DATA' : 'SIMPAN DATA KELUARGA' }}
                        </button>

                        @if ($isEditing)
                            <a href="{{ route('keluarga.index') }}" class="pmb-btn-secondary">
                                Batal Edit
                            </a>
                        @endif

                        <a href="{{ route('dashboard') }}" class="pmb-btn-secondary">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </form>
            </section>

            <section class="pmb-card">
                <h2 class="pmb-card-title">Data Keluarga Tersimpan</h2>
                <p class="pmb-card-desc">
                    Perubahan pada tombol Edit atau Hapus akan langsung memperbarui data di database.
                </p>

                @if ($jumlahData > 0)
                    <div class="pmb-list-stack">
                        @foreach ($daftarKeluarga as $item)
                            <div class="pmb-item-card">
                                <div>
                                    <div>
                                        <span class="pmb-item-rel">{{ $item->hubungan }}</span>
                                        <span class="pmb-item-name">{{ $item->nama }}</span>
                                    </div>
                                    <p class="pmb-item-hp">
                                        No. HP / Telepon: <strong>{{ $item->hp ?: 'Belum diisi' }}</strong>
                                    </p>
                                </div>

                                <div class="pmb-item-actions">
                                    <a
                                        href="{{ route('keluarga.index', ['edit' => $item->id]) }}"
                                        class="pmb-btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('keluarga.destroy', $item->id) }}"
                                        style="margin:0;"
                                        onsubmit="return confirm('Hapus data {{ addslashes($item->nama) }} ({{ addslashes($item->hubungan) }}) dari database?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="pmb-btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="pmb-empty-box">
                        <div style="font-size:12.5px;font-weight:700;color:#475569;">Belum ada data keluarga yang tersimpan.</div>
                        <div style="font-size:12px;color:#94a3b8;margin-top:4px;">Gunakan formulir di samping untuk menambahkan data Ayah, Ibu, atau Wali.</div>
                    </div>
                @endif
            </section>
        </div>
    </main>
</body>
</html>