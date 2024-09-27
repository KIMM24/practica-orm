<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Clase anónima que extiende de Migration para crear la tabla 'images'.
return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     * Esta función se llama al aplicar la migración.
     */
    public function up(): void
    {
        // Crea la tabla 'images' con las siguientes columnas.
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id'); // Columna 'id' como clave primaria autoincremental.
            $table->string('url'); // Columna 'url' para almacenar la dirección de la imagen.
            $table->morphs('imageable'); // Agrega columnas 'imageable_id' y 'imageable_type' para la relación polimórfica.
            $table->timestamps(); // Agrega columnas 'created_at' y 'updated_at' para gestionar las marcas de tiempo.
        });
    }

    /**
     * Revierte las migraciones.
     * Esta función se llama al deshacer la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('images'); // Elimina la tabla 'images' si existe.
    }
};
