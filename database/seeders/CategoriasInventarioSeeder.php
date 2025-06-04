<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriasInventarioSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Equipos', 'descripcion' => 'Equipos electrónicos y de oficina', 'estado' => 'ACTIVO'],
            ['nombre' => 'Herramientas', 'descripcion' => 'Herramientas manuales y eléctricas', 'estado' => 'ACTIVO'],
            ['nombre' => 'Materiales', 'descripcion' => 'Materiales de construcción y consumo', 'estado' => 'ACTIVO'],
            ['nombre' => 'Mobiliario', 'descripcion' => 'Muebles y enseres', 'estado' => 'ACTIVO'],
            ['nombre' => 'Vehículos', 'descripcion' => 'Vehículos y transporte', 'estado' => 'ACTIVO'],
        ];
        foreach ($categorias as $cat) {
            DB::table('categorias_inventario')->insert([
                'nombre' => $cat['nombre'],
                'descripcion' => $cat['descripcion'],
                'estado' => $cat['estado'],
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
