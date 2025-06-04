<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InventarioSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            DB::table('inventario')->insert([
                'categoria_id' => rand(1, 5),
                'codigo' => 'INV-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nombre' => 'Item Inventario ' . $i,
                'descripcion' => 'Descripción del inventario ' . $i,
                'marca' => 'Marca ' . $i,
                'modelo' => 'Modelo ' . $i,
                'nro_serie' => 'SN' . rand(10000, 99999),
                'stock' => rand(1, 50),
                'unidad_medida' => 'unidad',
                'fecha_aquisicion' => now()->subDays(rand(10, 100)),
                'estado_conservacion' => 'Bueno',
                'estado' => 'ACTIVO',
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
