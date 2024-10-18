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
        Schema::create('empleado', function (Blueprint $table) {
            $table->integer('ID_empleado', true);
            $table->string('Puesto', 50)->nullable();
            $table->decimal('Salario', 10)->nullable();
            $table->date('Fecha_contratacion')->nullable();
            $table->integer('ID_Usuario')->nullable()->index('id_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
