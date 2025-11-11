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
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('pais')->default('Perú');
            $table->integer('estrellas')->nullable(); // Categoría del hotel (1-5 estrellas)
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->decimal('precio_noche', 8, 2)->nullable();
            $table->integer('capacidad')->nullable(); // Número de habitaciones
            $table->text('servicios')->nullable(); // WiFi, Piscina, etc.
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoteles');
    }
};
