<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProyectosSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 7; $i++) {
            DB::table('proyectos')->insert([
                'nombre' => 'Proyecto ' . $i,
                'descripcion' => 'Descripción del proyecto ' . $i,
                'ubicacion' => 'Ubicación ' . $i,
                'fecha_inicio' => now()->subDays(rand(10, 100)),
                'fecha_fin' => now()->addDays(rand(10, 100)),
                'estado_proyecto' => 'En ejecución',
                'estado' => 'ACTIVO',
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
