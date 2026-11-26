<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PendidikanController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $daftarPendidikan = Pendidikan::where('user_id', $user->id)
            ->orderByDesc('tahun_lulus')
            ->orderByDesc('id')
            ->get();

        $pendidikanEdit = null;
        if ($request->filled('edit')) {
            $pendidikanEdit = Pendidikan::where('user_id', $user->id)
                ->whereKey($request->query('edit'))
                ->first();
        }

        return view('pendidikan.index', [
            'user' => $user,
            'daftarPendidikan' => $daftarPendidikan,
            'pendidikanEdit' => $pendidikanEdit,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'jenjang' => ['required', 'string', 'max:50'],
            'nama_sekolah' => ['required', 'string', 'max:150'],
            'jurusan' => ['nullable', 'string', 'max:120'],
            'tahun_lulus' => ['required', 'integer', 'min:1950', 'max:2035'],
        ]);

        Pendidikan::create([
            'user_id' => $request->user()->id,
            'jenjang' => $data['jenjang'],
            'nama_sekolah' => $data['nama_sekolah'],
            'jurusan' => $data['jurusan'] ?? null,
            'tahun_lulus' => (int) $data['tahun_lulus'],
            'no_ijazah' => null,
        ]);

        return redirect()
            ->route('pendidikan.index')
            ->with('pendidikan_status', 'Data riwayat pendidikan berhasil disimpan.');
    }

    public function update(Request $request, Pendidikan $pendidikan): RedirectResponse
    {
        abort_unless($pendidikan->user_id === $request->user()->id, 403);

        $data = $request->validate([
            'jenjang' => ['required', 'string', 'max:50'],
            'nama_sekolah' => ['required', 'string', 'max:150'],
            'jurusan' => ['nullable', 'string', 'max:120'],
            'tahun_lulus' => ['required', 'integer', 'min:1950', 'max:2035'],
        ]);

        $pendidikan->update([
            'jenjang' => $data['jenjang'],
            'nama_sekolah' => $data['nama_sekolah'],
            'jurusan' => $data['jurusan'] ?? null,
            'tahun_lulus' => (int) $data['tahun_lulus'],
            'no_ijazah' => null,
        ]);

        return redirect()
            ->route('pendidikan.index')
            ->with('pendidikan_status', 'Data riwayat pendidikan berhasil diperbarui.');
    }

    public function destroy(Request $request, Pendidikan $pendidikan): RedirectResponse
    {
        abort_unless($pendidikan->user_id === $request->user()->id, 403);

        $pendidikan->delete();

        return redirect()
            ->route('pendidikan.index')
            ->with('pendidikan_status', 'Data riwayat pendidikan berhasil dihapus.');
    }
}
