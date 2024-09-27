<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración.
     * Este método crea la tabla 'groups' con las columnas 'id' y 'name'.
     */
    public function up(): void
    {
        // Crear la tabla 'groups'
        Schema::create('groups', function (Blueprint $table) {
            // Columna 'id' como clave primaria auto-incremental
            $table->bigIncrements('id');

            // Columna 'name' para almacenar el nombre del grupo
            $table->string('name');

            // Columnas 'created_at' y 'updated_at' para registrar las fechas de creación y actualización
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración.
     * Este método elimina la tabla 'groups' si existe.
     */
    public function down(): void
    {
        // Eliminar la tabla 'groups' si existe
        Schema::dropIfExists('groups');
    }
};

