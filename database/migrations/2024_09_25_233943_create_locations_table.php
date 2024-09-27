<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración.
     * Esta función creará la tabla 'locations' con las columnas especificadas y la clave foránea.
     */
    public function up(): void
    {
        // Crea la tabla 'locations'
        Schema::create('locations', function (Blueprint $table) {
            // Columna 'id' como clave primaria auto-incremental
            $table->bigIncrements('id');
            
            // Columna 'profile_id' para relacionar la tabla 'locations' con 'profiles'
            // Se especifica como entero sin signo (bigInteger y unsigned)
            $table->bigInteger('profile_id')->unsigned();

            // Columna 'country' para almacenar el nombre del país (tipo string)
            $table->string('country');

            // Crea las columnas 'created_at' y 'updated_at' automáticamente
            $table->timestamps();

            // Define la clave foránea 'profile_id' que referencia al campo 'id' de la tabla 'profiles'
            // Se activa la eliminación en cascada: si se elimina un perfil, se eliminan sus ubicaciones asociadas
            // Se actualiza en cascada: si se actualiza un perfil, también se actualizan las ubicaciones
            $table->foreign('profile_id')->references('id')->on('profiles')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Revierte la migración.
     * Esta función eliminará la tabla 'locations' si existe.
     */
    public function down(): void
    {
        // Elimina la tabla 'locations' si ya existe
        Schema::dropIfExists('locations');
    }
};

