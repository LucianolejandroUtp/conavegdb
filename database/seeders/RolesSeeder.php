<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['nombre' => 'Administrador', 'descripcion' => 'Acceso total al sistema', 'estado' => 'ACTIVO'],
            ['nombre' => 'Supervisor', 'descripcion' => 'Supervisa procesos y usuarios', 'estado' => 'ACTIVO'],
            ['nombre' => 'Almacenero', 'descripcion' => 'Gestiona inventario', 'estado' => 'ACTIVO'],
            ['nombre' => 'Empleado', 'descripcion' => 'Usuario estándar', 'estado' => 'ACTIVO'],
            ['nombre' => 'Invitado', 'descripcion' => 'Acceso limitado', 'estado' => 'ACTIVO'],
        ];
        foreach ($roles as $rol) {
            DB::table('roles')->insert([
                'nombre' => $rol['nombre'],
                'descripcion' => $rol['descripcion'],
                'estado' => $rol['estado'],
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
