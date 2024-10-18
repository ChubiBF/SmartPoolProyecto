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
        Schema::create('compra', function (Blueprint $table) {
            $table->integer('ID_Compra', true);
            $table->date('Fecha_Compra');
            $table->integer('ID_Proveedor')->nullable()->index('id_proveedor');
            $table->integer('ID_Empleado')->nullable()->index('id_empleado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra');
    }
};
