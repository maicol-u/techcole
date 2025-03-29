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
        Schema::create('colegio_contactos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colegio_id')->constrained()->onDelete('cascade');
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('email')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('departamento')->nullable();
            $table->string('pais')->nullable();
            $table->string('sitio_web')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colegio_contactos');
    }
};
