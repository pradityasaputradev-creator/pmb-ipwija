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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo-ipwija-header.png') }}" alt="Logo IPWIJA" class="h-8 w-auto bg-white rounded p-1">
                <span class="font-extrabold text-base">PMB IPWIJA • ADMIN</span>
            </div>
            <div class="flex items-center gap-3">
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-xl sm:text-2xl font-extrabold">Halo, {{ Auth::user()->name }}</h1>
            <p class="text-xs sm:text-sm text-sky-100 mt-1">Dashboard Admin PMB Universitas IPWIJA (Periode 2026/2027)</p>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7 space-y-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-xs text-slate-400">Total Akun</p>
                <p class="text-2xl font-extrabold text-[#0077b6] mt-1">{{ \App\Models\User::count() }}</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-xs text-slate-400">Calon Mahasiswa</p>
                <p class="text-2xl font-extrabold text-slate-800 mt-1">{{ \App\Models\User::where('role', 'user')->count() }}</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-xs text-slate-400">Verifikasi Berkas</p>
                <p class="text-2xl font-extrabold text-slate-800 mt-1">0</p>
            </div>
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                <p class="text-xs text-slate-400">Status Seleksi</p>
                <p class="text-2xl font-extrabold text-slate-800 mt-1">Aktif</p>
            </div>
        </div>
    </main>
</body>
</html>
