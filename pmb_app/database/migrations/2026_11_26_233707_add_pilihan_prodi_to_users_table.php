<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fakultas')->nullable()->after('alamat');
            $table->string('program_pendidikan')->nullable()->after('fakultas');
            $table->string('pilihan_prodi')->nullable()->after('program_pendidikan');
            $table->string('sistem_kuliah')->nullable()->after('pilihan_prodi');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'fakultas',
                'program_pendidikan',
                'pilihan_prodi',
                'sistem_kuliah',
            ]);
        });
    }
};