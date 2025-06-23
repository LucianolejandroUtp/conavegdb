<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario administrador específico
        DB::table('users')->insert([
            'role_id' => 1, // ADMINISTRADOR
            'user_name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456mM'),
            'remember_token' => Str::random(10),
            'estado' => 'ACTIVO',
            'unique_id' => Str::uuid(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Usuarios de prueba
        for ($i = 1; $i <= 8; $i++) {
            DB::table('users')->insert([
                'role_id' => rand(1, 4),
                'user_name' => 'usuario' . $i,
                'email' => 'usuario' . $i . '@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'estado' => 'ACTIVO',
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
