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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('users_id')->nullable()->index();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('nombres')->unique();
            $table->string('apellidos')->nullable();
            $table->string('nro_documento')->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('puesto')->nullable();
            $table->date('fecha_ingreso')->nullable();       

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
        Schema::dropIfExists('empleados');
    }
};
