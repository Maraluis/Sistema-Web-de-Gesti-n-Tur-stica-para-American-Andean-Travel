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
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('pais')->nullable();
            $table->string('tipo_cocina')->nullable(); // Peruana, Internacional, Marina, etc.
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->integer('capacidad')->nullable(); // Número de comensales
            $table->decimal('precio_promedio', 8, 2)->nullable();
            $table->string('horario')->nullable(); // Ej: "8am-10pm"
            $table->text('especialidades')->nullable();
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
        Schema::dropIfExists('restaurantes');
    }
};
