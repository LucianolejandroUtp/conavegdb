<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmpleadosSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            DB::table('empleados')->insert([
                'users_id' => $i, // Relación ficticia para pruebas
                'nombres' => 'Empleado ' . $i,
                'apellidos' => 'Apellido ' . $i,
                'nro_documento' => 'DOC' . rand(100000, 999999),
                'fecha_nacimiento' => now()->subYears(rand(20, 40))->subDays(rand(1, 365)),
                'direccion' => 'Dirección ' . $i,
                'telefono' => '9' . rand(10000000, 99999999),
                'puesto' => 'Puesto ' . $i,
                'fecha_ingreso' => now()->subYears(rand(1, 10)),
                'estado' => 'ACTIVO',
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
