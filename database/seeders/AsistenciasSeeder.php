<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AsistenciasSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            DB::table('asistencias')->insert([
                'empleados_id' => $i,
                'entrada' => now()->subHours(rand(1, 3)),
                'salida' => now()->addHours(rand(1, 3)),
                'tipo_registro' => 'Normal',
                'ubicacion_registro' => 'Oficina ' . rand(1, 3),
                'metodo_registro' => 'Manual',
                'observacion' => 'Sin novedad',
                'estado' => 'ACTIVO',
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
