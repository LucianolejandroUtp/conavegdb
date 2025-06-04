<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AsignacionesProyectosEmpleadosSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            DB::table('asignaciones_proyectos_empleados')->insert([
                'empleados_id' => $i,
                'proyectos_id' => rand(1, 7),
                'fecha_asignacion' => now()->subDays(rand(1, 100)),
                'fecha_fin_asignacion' => now()->addDays(rand(1, 100)),
                'rol' => 'Participante',
                'estado' => 'ACTIVO',
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
