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
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('ID_Usuario', true);
            $table->string('Nombre', 50);
            $table->string('Apellido', 50);
            $table->string('Email', 100)->nullable();
            $table->string('Contraseña', 100);
            $table->date('Fecha_registro')->nullable();
            $table->string('Telefono', 20)->nullable();
            $table->integer('ID_Rol')->nullable()->index('id_rol');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
