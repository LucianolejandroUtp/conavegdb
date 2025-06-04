<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProveedoresSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 7; $i++) {
            DB::table('proveedores')->insert([
                'ruc' => 'RUC' . rand(10000000, 99999999),
                'razon_social' => 'Proveedor ' . $i,
                'direccion' => 'Dirección ' . $i,
                'telefono' => '9' . rand(10000000, 99999999),
                'estado' => 'ACTIVO',
                'unique_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
