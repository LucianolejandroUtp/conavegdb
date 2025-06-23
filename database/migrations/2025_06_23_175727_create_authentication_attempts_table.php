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
        Schema::create('authentication_attempts', function (Blueprint $table) {
           $table->id();
    $table->string('email', 255);
    $table->string('ip_address', 45); // IPv4 y IPv6
    $table->timestamp('attempt_time')->useCurrent();
    $table->boolean('successful');
    $table->text('user_agent')->nullable();
    $table->string('failure_reason', 500)->nullable();
    $table->string('attempt_type', 50)->default('LOGIN'); // Nueva columna para tipo de intento
    
    // Índices críticos para rate limiting
    $table->index(['email', 'attempt_time']);
    $table->index(['ip_address', 'attempt_time']);
    $table->index('attempt_time');
    $table->index('successful');
    $table->index(['attempt_type', 'attempt_time']); // Nuevo índice compuesto para rate limiting específico
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authentication_attempts');
    }
};
