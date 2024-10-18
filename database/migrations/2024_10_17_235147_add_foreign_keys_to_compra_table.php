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
        Schema::table('compra', function (Blueprint $table) {
            $table->foreign(['ID_Proveedor'], 'compra_ibfk_1')->references(['ID_Proveedor'])->on('proveedor')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ID_Empleado'], 'compra_ibfk_2')->references(['ID_empleado'])->on('empleado')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compra', function (Blueprint $table) {
            $table->dropForeign('compra_ibfk_1');
            $table->dropForeign('compra_ibfk_2');
        });
    }
};
