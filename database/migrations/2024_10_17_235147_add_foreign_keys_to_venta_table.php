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
        Schema::table('venta', function (Blueprint $table) {
            $table->foreign(['ID_Cliente'], 'venta_ibfk_1')->references(['ID_Cliente'])->on('cliente')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ID_Empleado'], 'venta_ibfk_2')->references(['ID_empleado'])->on('empleado')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venta', function (Blueprint $table) {
            $table->dropForeign('venta_ibfk_1');
            $table->dropForeign('venta_ibfk_2');
        });
    }
};
