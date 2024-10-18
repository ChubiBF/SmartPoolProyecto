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
        Schema::table('pago', function (Blueprint $table) {
            $table->foreign(['ID_Reserva'], 'pago_ibfk_1')->references(['ID_reserva'])->on('reserva')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ID_Servicio'], 'pago_ibfk_2')->references(['ID_Servicio'])->on('servicio')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ID_Venta'], 'pago_ibfk_3')->references(['ID_Venta'])->on('venta')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pago', function (Blueprint $table) {
            $table->dropForeign('pago_ibfk_1');
            $table->dropForeign('pago_ibfk_2');
            $table->dropForeign('pago_ibfk_3');
        });
    }
};
