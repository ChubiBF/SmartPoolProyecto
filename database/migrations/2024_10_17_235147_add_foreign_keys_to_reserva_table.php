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
        Schema::table('reserva', function (Blueprint $table) {
            $table->foreign(['ID_Cliente'], 'reserva_ibfk_1')->references(['ID_Cliente'])->on('cliente')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ID_empleado'], 'reserva_ibfk_2')->references(['ID_empleado'])->on('empleado')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ID_Piscina'], 'reserva_ibfk_3')->references(['ID_Piscina'])->on('piscina')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reserva', function (Blueprint $table) {
            $table->dropForeign('reserva_ibfk_1');
            $table->dropForeign('reserva_ibfk_2');
            $table->dropForeign('reserva_ibfk_3');
        });
    }
};
