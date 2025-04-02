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
        Schema::create('periodos_academicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colegio_id')->constrained()->onDelete('cascade');
            $table->integer('anio')->comment('Año académico, ejemplo: 2025');
            $table->tinyInteger('semestre')->comment('1: Primer semestre, 2: Segundo semestre, 3: Trimestre, etc.');
            $table->date('inicio')->comment('Fecha de inicio del período');
            $table->date('fin')->comment('Fecha de finalización del período');
            $table->timestamps();

            $table->unique(['colegio_id', 'anio', 'semestre'], 'colegio_anio_semestre_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos_academicos');
    }
};
