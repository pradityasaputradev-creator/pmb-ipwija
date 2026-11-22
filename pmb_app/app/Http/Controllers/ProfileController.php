<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Keluarga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('profile.edit', [
            'user' => $user,
            'keluarga' => $user->keluarga,
        ]);
    }

    /**
     * Display the dedicated family data page.
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
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

