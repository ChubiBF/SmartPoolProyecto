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
        Schema::table('detalle_compra', function (Blueprint $table) {
            $table->foreign(['ID_Compra'], 'detalle_compra_ibfk_1')->references(['ID_Compra'])->on('compra')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ID_Producto'], 'detalle_compra_ibfk_2')->references(['ID_Producto'])->on('producto')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalle_compra', function (Blueprint $table) {
            $table->dropForeign('detalle_compra_ibfk_1');
            $table->dropForeign('detalle_compra_ibfk_2');
        });
    }
};
