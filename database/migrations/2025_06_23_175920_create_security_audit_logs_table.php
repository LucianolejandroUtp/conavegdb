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
        Schema::create('security_audit_logs', function (Blueprint $table) {
            $table->id();
    $table->string('event_type', 50);
    $table->unsignedBigInteger('user_id')->nullable();
    $table->string('email', 255);
    $table->string('ip_address', 45);
    $table->text('user_agent')->nullable();
    $table->timestamp('timestamp')->useCurrent();
    $table->string('details', 1000)->nullable();
    $table->enum('severity', ['LOW', 'MEDIUM', 'HIGH', 'CRITICAL']);
    
    // Índices para consultas y reportes
    $table->index('event_type');
    $table->index('user_id');
    $table->index('email');
    $table->index('timestamp');
    $table->index('severity');
    $table->index(['email', 'timestamp']); // Consultas combinadas frecuentes
    
    // Foreign key opcional
    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_audit_logs');
    }
};
