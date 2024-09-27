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
        // Crea la tabla 'users' para almacenar los datos de los usuarios
        Schema::create('users', function (Blueprint $table) {
            // Crea una columna 'id' auto-incremental como clave primaria
            $table->bigIncrements('id');
            // Crea una columna 'name' de tipo string para el nombre del usuario
            $table->string('name');
            // Crea una columna 'email' de tipo string que debe ser única
            $table->string('email')->unique();
            // Crea una columna 'email_verified_at' de tipo timestamp para verificar si el email ha sido confirmado
            $table->timestamp('email_verified_at')->nullable();
            // Crea una columna 'password' de tipo string para almacenar la contraseña del usuario
            $table->string('password');
            // Crea una columna 'remember_token' para el token de "recordar usuario" en las sesiones
            $table->rememberToken();
            // Crea las columnas 'created_at' y 'updated_at' para las marcas de tiempo de creación y actualización
            $table->timestamps();
        });

        // Crea la tabla 'password_reset_tokens' para almacenar los tokens de restablecimiento de contraseñas
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            // Crea una columna 'email' que será la clave primaria para identificar los tokens por correo
            $table->string('email')->primary();
            // Crea una columna 'token' de tipo string para almacenar el token de restablecimiento de contraseña
            $table->string('token');
            // Crea una columna 'created_at' de tipo timestamp para registrar la fecha de creación del token
            $table->timestamp('created_at')->nullable();
        });

        // Crea la tabla 'sessions' para almacenar las sesiones de los usuarios
        Schema::create('sessions', function (Blueprint $table) {
            // Crea una columna 'id' de tipo string como clave primaria para identificar cada sesión
            $table->string('id')->primary();
            // Crea una columna 'user_id' como clave foránea que apunta a la tabla 'users', permitiendo valores nulos
            $table->foreignId('user_id')->nullable()->index();
            // Crea una columna 'ip_address' para almacenar la dirección IP del usuario, máximo 45 caracteres (IPv6 compatible)
            $table->string('ip_address', 45)->nullable();
            // Crea una columna 'user_agent' de tipo texto para almacenar el agente de usuario del navegador
            $table->text('user_agent')->nullable();
            // Crea una columna 'payload' de tipo longText para almacenar datos de la sesión en forma serializada
            $table->longText('payload');
            // Crea una columna 'last_activity' de tipo entero para registrar el último momento de actividad en la sesión
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        // Elimina la tabla 'users' si existe
        Schema::dropIfExists('users');
        // Elimina la tabla 'password_reset_tokens' si existe
        Schema::dropIfExists('password_reset_tokens');
        // Elimina la tabla 'sessions' si existe
        Schema::dropIfExists('sessions');
    }
};

