<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KeluargaController extends Controller
{
    /**
     * Display the family data form.
     */
    public function keluarga(Request $request): View
    {
        $user = $request->user();

        return view('keluarga.index', [
            'user' => $user,
            'keluarga' => $user->keluarga,
        ]);
    }

    /**
     * Store or update family data in database.
     */
    public function updateKeluarga(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama_keluarga' => ['required', 'string', 'max:120'],
            'hubungan_keluarga' => ['required', 'string', 'max:40'],
            'hp_keluarga' => ['nullable', 'string', 'max:30'],
        ]);

        Keluarga::updateOrCreate(
            ['user_id' => $request->user()->id],
            [
                'nama' => $data['nama_keluarga'],
                'hubungan' => $data['hubungan_keluarga'],
                'hp' => $data['hp_keluarga'] ?? null,
            ]
        );

        $request->session()->flash('keluarga_status', 'Data keluarga berhasil disimpan.');

        return Redirect::route('keluarga.index');
    }
}