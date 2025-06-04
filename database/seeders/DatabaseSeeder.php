<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\CategoriasInventarioSeeder;
use Database\Seeders\ProyectosSeeder;
use Database\Seeders\InventarioSeeder;
use Database\Seeders\EmpleadosSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\AsistenciasSeeder;
use Database\Seeders\AsignacionesProyectosEmpleadosSeeder;
use Database\Seeders\MovimientosInventarioSeeder;
use Database\Seeders\ProveedoresSeeder;
use Database\Seeders\FacturasSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            CategoriasInventarioSeeder::class,
            InventarioSeeder::class,
            ProyectosSeeder::class,
            UsersSeeder::class,
            EmpleadosSeeder::class,
            AsistenciasSeeder::class,
            AsignacionesProyectosEmpleadosSeeder::class,
            MovimientosInventarioSeeder::class,
            ProveedoresSeeder::class,
            FacturasSeeder::class,
        ]);
    }
}
