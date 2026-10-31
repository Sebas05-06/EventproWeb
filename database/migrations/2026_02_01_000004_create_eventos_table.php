<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->string('tipo', 20); // congreso, boda, feria, concierto, otro
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // responsable interno
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->unsignedInteger('asistentes')->default(0);
            $table->string('estado', 20)->default('planificado'); // planificado, confirmado, finalizado, cancelado
            $table->timestamps();
        });

        Schema::create('evento_recinto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos')->cascadeOnDelete();
            $table->foreignId('recinto_id')->constrained('recintos')->cascadeOnDelete();
            $table->string('montaje', 20)->nullable();
            $table->timestamps();
        });

        Schema::create('evento_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos')->cascadeOnDelete();
            $table->foreignId('servicio_id')->constrained('servicios')->cascadeOnDelete();
            $table->unsignedInteger('cantidad')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evento_servicio');
        Schema::dropIfExists('evento_recinto');
        Schema::dropIfExists('eventos');
    }
};
