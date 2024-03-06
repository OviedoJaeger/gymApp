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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('foto')->nullable();
            $table->string('telefono');
            $table->string('telefono_emergencia')->nullable();
            $table->string('correo')->unique();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->string('tipo_paquete');
            $table->integer('edad');
            $table->text('observaciones')->nullable();
            $table->integer('paquetes_renovados')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
