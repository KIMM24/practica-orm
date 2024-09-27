<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Clase anónima que extiende de Migration para crear la tabla 'comments'.
return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     * Esta función se llama al aplicar la migración.
     */
    public function up(): void
    {
        // Crea la tabla 'comments' con las siguientes columnas.
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id'); // Columna 'id' como clave primaria autoincremental.

            $table->bigInteger('user_id')->unsigned(); // Columna 'user_id' para almacenar la referencia al usuario.

            $table->text('body'); // Columna 'body' para almacenar el contenido del comentario.

            $table->morphs('commentable'); // Agrega columnas 'commentable_id' y 'commentable_type' para la relación polimórfica.

            $table->timestamps(); // Agrega columnas 'created_at' y 'updated_at'.

            // Define una clave foránea para 'user_id' que hace referencia a 'id' en la tabla 'users'.
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade') // Elimina los comentarios relacionados si se elimina el usuario.
                ->onUpdate('cascade'); // Actualiza el 'user_id' si se actualiza el 'id' del usuario.
        });
    }

    /**
     * Revierte las migraciones.
     * Esta función se llama al deshacer la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments'); // Elimina la tabla 'comments' si existe.
    }
};
