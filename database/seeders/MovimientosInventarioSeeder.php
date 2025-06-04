<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MovimientosInventarioSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            DB::table('movimientos_inventario')->insert([
                'inventario_id' => $i,
                'empleados_id_asigna' => rand(1, 8),
                'empleados_id_recibe' => rand(1, 8),
                'proyectos_id' => rand(1, 7),
                'tipo_movimiento' => 'Salida',
                'cantidad' => rand(1, 10),
                'fecha_movimiento' => now()->subDays(rand(1, 30)),
                'observacion' => 'Movimiento de prueba',
                'estado' => 'ACTIVO',
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
