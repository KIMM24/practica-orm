<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        // Crea la tabla 'profiles' en la base de datos
        Schema::create('profiles', function (Blueprint $table) {
            // Crea una columna 'id' auto-incremental como clave primaria
            $table->bigIncrements('id');

            // Crea una columna 'user_id' que será una clave foránea, sin signo
            $table->bigInteger('user_id')->unsigned();

            // Crea una columna 'instagram' de tipo string que puede ser nula
            $table->string('instagram')->nullable;

            // Crea una columna 'github' de tipo string que puede ser nula
            $table->string('github')->nullable;

            // Crea una columna 'web' de tipo string que puede ser nula
            $table->string('web')->nullable;

            // Crea las columnas 'created_at' y 'updated_at' para almacenar las marcas de tiempo
            $table->timestamps();
            
            // Define la clave foránea 'user_id' que referencia la columna 'id' de la tabla 'users'
            // Si el usuario es eliminado, los perfiles relacionados también se eliminan ('cascade')
            // Si el usuario es actualizado, los perfiles relacionados también se actualizan ('cascade')
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'profiles' si existe
        Schema::dropIfExists('profiles');
    }
};

  
