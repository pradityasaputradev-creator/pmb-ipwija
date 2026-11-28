<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->user()?->role !== 'admin') {
            abort(403, 'Akses khusus Admin PMB.');
        }

        $tab = $request->query('tab', 'ringkasan');
        $search = trim((string) $request->query('q', ''));
        $statusFilter = trim((string) $request->query('status', ''));

        $totalAkun = User::count();
        $totalCalonMahasiswa = $this->nonAdminQuery()->count();

        $pendaftarQuery = $this->nonAdminQuery()
            ->withCount(['keluargas', 'pendidikans']);

        if ($search !== '') {
            $pendaftarQuery->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $this->applyCompletionFilter($pendaftarQuery, $statusFilter);

        $pendaftar = $pendaftarQuery
            ->latest('id')
            ->get();

        $pendaftarDetail = null;
        if ($request->filled('detail')) {
            $pendaftarDetail = $this->nonAdminQuery()
                ->with(['keluargas', 'pendidikans', 'fotoCalonMahasiswa'])
                ->whereKey($request->query('detail'))
                ->first();
        }

        return view('admin.dashboard', [
            'tab' => $tab,
            'search' => $search,
            'statusFilter' => $statusFilter,
            'totalAkun' => $totalAkun,
            'totalCalonMahasiswa' => $totalCalonMahasiswa,
            'pendaftar' => $pendaftar,
            'pendaftarDetail' => $pendaftarDetail,
        ]);
    }

    private function nonAdminQuery(): Builder
    {
        return User::query()->where(function (Builder $query) {
            $query->whereNull('role')->orWhere('role', '!=', 'admin');
        });
    }

    private function applyCompletionFilter(Builder $query, string $statusFilter): void
    {
        if ($statusFilter === 'lengkap') {
            $query
                ->whereNotNull('nik')->where('nik', '!=', '')
                ->whereNotNull('no_hp')->where('no_hp', '!=', '')
                ->whereNotNull('alamat')->where('alamat', '!=', '')
                ->has('keluargas')
                ->has('pendidikans');
        } elseif ($statusFilter === 'belum_lengkap') {
            $query->where(function (Builder $subQuery) {
                $subQuery->whereNull('nik')->orWhere('nik', '')
                    ->orWhereNull('no_hp')->orWhere('no_hp', '')
                    ->orWhereNull('alamat')->orWhere('alamat', '')
                    ->orDoesntHave('keluargas')
                    ->orDoesntHave('pendidikans');
            });
        }
    }
}
