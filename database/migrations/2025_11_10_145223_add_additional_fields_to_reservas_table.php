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
        Schema::table('reservas', function (Blueprint $table) {
            $table->date('fecha_inicio')->nullable()->after('fecha_reserva');
            $table->date('fecha_fin')->nullable()->after('fecha_inicio');
            $table->integer('num_personas')->default(1)->after('fecha_fin');
            $table->decimal('precio_total', 10, 2)->default(0)->after('num_personas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropColumn(['fecha_inicio', 'fecha_fin', 'num_personas', 'precio_total']);
        });
    }
};
