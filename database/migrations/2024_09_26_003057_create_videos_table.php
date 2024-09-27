<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     * Crea la tabla 'videos' en la base de datos.
     */
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            // Definición de la columna 'id' como clave primaria autoincremental
            $table->bigIncrements('id');

            // Definición de la columna 'category_id' como bigint sin signo
            $table->bigInteger('category_id')->unsigned();
            // Definición de la columna 'user_id' como bigint sin signo
            $table->bigInteger('user_id')->unsigned();

            // Definición de la columna 'name' como tipo string
            $table->string('name');

            // Agregar columnas de marca de tiempo para la creación y actualización
            $table->timestamps();

            // Definición de la clave foránea 'category_id' que referencia a 'id' en la tabla 'categories'
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade') // Elimina videos si se elimina la categoría
                ->onUpdate('cascade'); // Actualiza videos si se actualiza la categoría

            // Definición de la clave foránea 'user_id' que referencia a 'id' en la tabla 'users'
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade') // Elimina videos si se elimina el usuario
                ->onUpdate('cascade'); // Actualiza videos si se actualiza el usuario
        });
    }

    /**
     * Revierte las migraciones.
     * Elimina la tabla 'videos' de la base de datos.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};

