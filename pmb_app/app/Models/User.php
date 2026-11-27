<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use IlluminateDatabaseEloquentRelationsHasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'nik', 'tanggal_lahir', 'no_hp', 'alamat',
        'fakultas',
        'program_pendidikan',
        'pilihan_prodi',
        'sistem_kuliah', 'password', 'role', 'is_active', 'otp_code'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'tanggal_lahir' => 'date',
            'password' => 'hashed',
        ];
    }

    public function keluarga(): HasOne
    {
        return $this->hasOne(Keluarga::class);
    }
    public function keluargas(): HasMany
    {
        return $this->hasMany(Keluarga::class);
    }

    public function pendidikans(): HasMany
    {
        return $this->hasMany(Pendidikan::class);
    }
}