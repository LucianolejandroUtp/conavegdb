<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    public function run(): void
    {        $roles = [
            ['nombre' => 'ADMINISTRADOR', 'descripcion' => 'Acceso total al sistema, administra todos los recursos', 'estado' => 'ACTIVO'],
            ['nombre' => 'GERENTE', 'descripcion' => 'Gestiona proyectos, empleados y recursos del área', 'estado' => 'ACTIVO'],
            ['nombre' => 'EMPLEADO', 'descripcion' => 'Usuario operativo, acceso limitado a funciones específicas', 'estado' => 'ACTIVO'],
            ['nombre' => 'USER', 'descripcion' => 'Usuario básico con permisos mínimos de lectura', 'estado' => 'ACTIVO'],
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
