<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FacturasSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            DB::table('facturas')->insert([
                'proveedores_id' => rand(1, 7),
                'usuarios_id' => rand(1, 8),
                'nro_factura' => 'F' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'tipo_documento' => 'Factura',
                'fecha_emision' => now()->subDays(rand(1, 100)),
                'fecha_vencimiento' => now()->addDays(rand(1, 100)),
                'monto_total' => rand(100, 10000),
                'moneda' => 'PEN',
                'descripcion' => 'Factura de prueba',
                'ruta_archivo' => null,
                'nombre_archivo' => null,
                'estado_factura' => 'Pendiente',
                'estado' => 'ACTIVO',
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
