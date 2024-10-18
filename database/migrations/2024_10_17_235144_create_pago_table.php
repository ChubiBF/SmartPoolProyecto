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
        Schema::create('pago', function (Blueprint $table) {
            $table->integer('ID_Pago', true);
            $table->date('Fecha_Pago');
            $table->string('Metodo_Pago', 50)->nullable();
            $table->integer('ID_Reserva')->nullable()->index('id_reserva');
            $table->integer('ID_Servicio')->nullable()->index('id_servicio');
            $table->integer('ID_Venta')->nullable()->index('id_venta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago');
    }
};
