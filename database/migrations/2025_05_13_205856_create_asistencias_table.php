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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('empleados_id')->nullable()->index();
            $table->foreign('empleados_id')->references('id')->on('empleados')->onDelete('cascade');

            $table->uuid('unique_id')->unique();
            $table->datetime('entrada')->nullable();
            $table->datetime('salida')->nullable();
            $table->string('tipo_registro')->nullable();
            $table->string('ubicacion_registro')->nullable();
            $table->string('metodo_registro')->nullable();
            $table->text('observacion')->nullable();

            $table->enum('estado', ['ACTIVO', 'INACTIVO','ELIMINADO'])->default('ACTIVO');
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
        Schema::dropIfExists('asistencias');
    }
};
