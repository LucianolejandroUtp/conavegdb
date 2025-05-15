<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();

            $table->string('ruc')->nullable()->unique();
            $table->string('razon_social')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            
            $table->enum('estado', ['ACTIVO', 'INACTIVO','ELIMINADO'])->default('ACTIVO');
            $table->uuid('unique_id')->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
