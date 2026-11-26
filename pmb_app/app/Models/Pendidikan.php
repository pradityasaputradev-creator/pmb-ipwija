<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenjang',
        'nama_sekolah',
        'jurusan',
        'tahun_lulus',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
