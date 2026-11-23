<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik', 20)->nullable()->after('email');
            $table->date('tanggal_lahir')->nullable()->after('nik');
            $table->string('no_hp', 20)->nullable()->after('tanggal_lahir');
            $table->text('alamat')->nullable()->after('no_hp');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nik', 'tanggal_lahir', 'no_hp', 'alamat']);
        });
    }
};
