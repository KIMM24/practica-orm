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
        // Modifica la tabla 'users' para agregar una nueva columna
        Schema::table('users', function (Blueprint $table) {
            // Agrega una columna 'level_id' de tipo bigInteger que no es signado y puede ser nula
            // La columna se añadirá después de la columna 'id'
            $table->bigInteger('level_id')->unsigned()->nullable()->after('id');

            // Define 'level_id' como una clave foránea que referencia a la columna 'id' de la tabla 'levels'
            // Si el registro en la tabla 'levels' es eliminado, el valor de 'level_id' en la tabla 'users' se establece como nulo ('set null')
            // Si el registro en la tabla 'levels' es actualizado, el valor en 'level_id' se actualizará en consecuencia ('cascade')
            $table->foreign('level_id')->references('id')->on('levels')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // 
        // 
    }
};
