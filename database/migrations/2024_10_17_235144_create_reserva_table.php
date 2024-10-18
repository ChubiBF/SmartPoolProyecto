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
        Schema::create('reserva', function (Blueprint $table) {
            $table->integer('ID_reserva', true);
            $table->date('Fecha_reserva');
            $table->time('Hora_inicio');
            $table->time('Hora_fin');
            $table->decimal('Adelanto', 10)->nullable();
            $table->decimal('Descuento', 10)->nullable();
            $table->string('Tipo_reserva', 50)->nullable();
            $table->integer('ID_Cliente')->nullable()->index('id_cliente');
            $table->integer('ID_empleado')->nullable()->index('id_empleado');
            $table->integer('ID_Piscina')->nullable()->index('id_piscina');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
