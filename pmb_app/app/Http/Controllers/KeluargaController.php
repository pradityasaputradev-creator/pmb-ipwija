<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KeluargaController extends Controller
{
    public function keluarga(Request $request): View
    {
        $user = $request->user();

        $daftarKeluarga = Keluarga::where('user_id', $user->id)
            ->orderBy('id')
            ->get();

        $keluargaEdit = null;
        if ($request->filled('edit')) {
            $keluargaEdit = Keluarga::where('user_id', $user->id)
                ->where('id', $request->integer('edit'))
                ->first();
        }

        return view('keluarga.index', [
            'user' => $user,
            'daftarKeluarga' => $daftarKeluarga,
            'keluargaEdit' => $keluargaEdit,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama_keluarga' => ['required', 'string', 'max:120'],
            'hubungan_keluarga' => ['required', 'in:Ayah,Ibu,Wali'],
            'hp_keluarga' => ['nullable', 'string', 'max:30'],
        ]);

        Keluarga::create([
            'user_id' => $request->user()->id,
            'nama' => $data['nama_keluarga'],
            'hubungan' => $data['hubungan_keluarga'],
            'hp' => $data['hp_keluarga'] ?? null,
        ]);

        $request->session()->flash('keluarga_status', 'Data keluarga berhasil disimpan');

        return Redirect::route('keluarga.index');
    }

    public function update(Request $request, Keluarga $keluarga): RedirectResponse
    {
        if ($keluarga->user_id !== $request->user()->id) {
            abort(403);
        }

        $data = $request->validate([
            'nama_keluarga' => ['required', 'string', 'max:120'],
            'hubungan_keluarga' => ['required', 'in:Ayah,Ibu,Wali'],
            'hp_keluarga' => ['nullable', 'string', 'max:30'],
        ]);

        $keluarga->update([
            'nama' => $data['nama_keluarga'],
            'hubungan' => $data['hubungan_keluarga'],
            'hp' => $data['hp_keluarga'] ?? null,
        ]);

        $request->session()->flash('keluarga_status', 'Data keluarga berhasil diperbarui.');

        return Redirect::route('keluarga.index');
    }

    public function destroy(Request $request, Keluarga $keluarga): RedirectResponse
    {
        if ($keluarga->user_id !== $request->user()->id) {
            abort(403);
        }

        $keluarga->delete();

        $request->session()->flash('keluarga_status', 'Data keluarga berhasil dihapus.');

        return Redirect::route('keluarga.index');
    }
}
