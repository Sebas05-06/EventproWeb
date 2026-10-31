<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recintos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion', 255);
            $table->decimal('tarifa_hora', 10, 2);
            $table->decimal('tarifa_dia', 10, 2);
            $table->boolean('destacado')->default(false);
            $table->timestamps();
        });

        Schema::create('capacidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recinto_id')->constrained('recintos')->cascadeOnDelete();
            $table->string('montaje', 20); // teatro, escuela, banquete
            $table->unsignedInteger('personas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('capacidades');
        Schema::dropIfExists('recintos');
    }
};
