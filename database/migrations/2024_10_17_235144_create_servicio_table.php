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
        Schema::create('servicio', function (Blueprint $table) {
            $table->integer('ID_Servicio', true);
            $table->integer('ID_Cliente')->nullable()->index('id_cliente');
            $table->integer('ID_Empleado')->nullable()->index('id_empleado');
            $table->integer('ID_Tipo_Servicio')->nullable()->index('id_tipo_servicio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio');
    }
};
