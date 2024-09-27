<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Definición de la migración para crear la tabla 'posts'
return new class extends Migration
{
    /**
     * Método para ejecutar la migración.
     * Se encarga de crear la tabla 'posts' en la base de datos.
     */
    public function up(): void
    {
        // Creación de la tabla 'posts'
        Schema::create('posts', function (Blueprint $table) {
            // Definición de la columna 'id' como clave primaria autoincremental
            $table->bigIncrements('id');

            // Definición de la columna 'name' como string
            $table->string('name');

            // Definición de la columna 'category_id' como bigint sin signo
            // Esta columna se relaciona con la tabla 'categories'
            $table->bigInteger('category_id')->unsigned();
            // Definición de la columna 'user_id' como bigint sin signo
            // Esta columna se relaciona con la tabla 'users'
            $table->bigInteger('user_id')->unsigned();

            // Agrega las columnas de marca de tiempo para la creación y actualización
            $table->timestamps();

            // Definición de la clave foránea 'category_id'
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade') // Elimina los posts si se elimina la categoría
                ->onUpdate('cascade'); // Actualiza los posts si se actualiza la categoría

            // Definición de la clave foránea 'user_id'
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade') // Elimina los posts si se elimina el usuario
                ->onUpdate('cascade'); // Actualiza los posts si se actualiza el usuario                
        });
    }

    /**
     * Método para revertir la migración.
     * Se encarga de eliminar la tabla 'posts' de la base de datos.
     */
    public function down(): void
    {
        // Elimina la tabla 'posts' si existe
        Schema::dropIfExists('posts');
    }
};
    