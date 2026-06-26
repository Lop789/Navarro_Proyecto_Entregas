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
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('apellido', 100);
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();

            $table->boolean('estado')->default(1);
            $table->string('rol', 50)->default('admin');
            $table->timestamp('fecha_registro')->nullable()->useCurrent();

            $table->string('pic', 150)->nullable();
            $table->string('contrasena')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
