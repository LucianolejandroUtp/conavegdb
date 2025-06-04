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
        Schema::create('movimientos_inventario', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('inventario_id')->nullable()->index();
            $table->unsignedBigInteger('empleados_id_asigna')->nullable()->index();
            $table->unsignedBigInteger('empleados_id_recibe')->nullable()->index();
            $table->unsignedBigInteger('proyectos_id')->nullable()->index();
            $table->foreign('inventario_id')->references('id')->on('inventario')->onDelete('cascade');
            $table->foreign('empleados_id_asigna')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('empleados_id_recibe')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('proyectos_id')->references('id')->on('proyectos')->onDelete('cascade');

            $table->string('tipo_movimiento')->nullable();
            $table->integer('cantidad')->default(0);
            $table->datetime('fecha_movimiento')->nullable();
            $table->text('observacion')->nullable();
            $table->enum('estado', ['ACTIVO', 'INACTIVO','ELIMINADO'])->default('ACTIVO')->nullable();
            $table->uuid('unique_id')->unique()->default(DB::raw('uuid()'))->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_inventario');
    }
};
