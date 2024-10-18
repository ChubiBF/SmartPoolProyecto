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
        Schema::table('servicio', function (Blueprint $table) {
            $table->foreign(['ID_Cliente'], 'servicio_ibfk_1')->references(['ID_Cliente'])->on('cliente')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ID_Empleado'], 'servicio_ibfk_2')->references(['ID_empleado'])->on('empleado')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ID_Tipo_Servicio'], 'servicio_ibfk_3')->references(['ID_Tipo_Servicio'])->on('tipo_servicio')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicio', function (Blueprint $table) {
            $table->dropForeign('servicio_ibfk_1');
            $table->dropForeign('servicio_ibfk_2');
            $table->dropForeign('servicio_ibfk_3');
        });
    }
};
