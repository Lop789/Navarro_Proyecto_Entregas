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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 120);
            $table->string('categoria', 60);
            $table->text('descripcion');
            $table->decimal('ahorro_kgco2e', 10, 2)->nullable()->default(0.00);

            $table->boolean('estado')->default(1);
            $table->decimal('ahorro_agua_litros', 10, 2)->nullable()->default(0.00);

            $table->string('pic1', 255);
            $table->string('pic2', 255);
            $table->string('pic3', 255);
            $table->decimal('precio', 10, 2)->nullable()->default(0.00);
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
