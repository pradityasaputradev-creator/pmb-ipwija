<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FotoCalonMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'foto_calon_mahasiswas';

    protected $fillable = [
        'user_id',
        'path_foto',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}