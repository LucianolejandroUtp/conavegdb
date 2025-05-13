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
        Schema::create('asignaciones_proyectos_empleados', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('empleados_id')->nullable()->index();
            $table->unsignedBigInteger('proyectos_id')->nullable()->index();
            $table->foreign('empleados_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('proyectos_id')->references('id')->on('proyectos')->onDelete('cascade');

            $table->date('fecha_asignacion')->nullable();
            $table->date('fecha_fin_asignacion')->nullable();
            $table->string('rol')->nullable();
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
        Schema::dropIfExists('asignaciones_proyectos_empleados');
    }
};
