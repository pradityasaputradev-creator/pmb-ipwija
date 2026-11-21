<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ipwija.ac.id'],
            [
                'name' => 'Admin PMB IPWIJA',
                'password' => Hash::make('AdminPmb123!'),
                'role' => 'admin',
                'is_active' => 'active',
                'email_verified_at' => now(),
            ]
        );
    }
}
