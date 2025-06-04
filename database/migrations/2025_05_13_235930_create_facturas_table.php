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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('proveedores_id')->nullable()->index();
            $table->unsignedBigInteger('usuarios_id')->nullable()->index();
            $table->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('usuarios_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('nro_factura')->nullable()->unique();
            $table->string('tipo_documento')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->integer('monto_total')->default(0);
            $table->string('moneda')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('ruta_archivo')->nullable();
            $table->string('nombre_archivo')->nullable();
            $table->string('estado_factura')->nullable();
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
        Schema::dropIfExists('facturas');
    }
};
