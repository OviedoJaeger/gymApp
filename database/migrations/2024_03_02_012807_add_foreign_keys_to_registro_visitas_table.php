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
        Schema::table('registro_visitas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario')->after('id_registro_visita');
            $table->unsignedBigInteger('id_visita')->after('id_usuario');

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_visita')->references('id_visita')->on('clientes_visitas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registro_visitas', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
            $table->dropColumn('id_usuario');

            $table->dropForeign(['id_visita']);
            $table->dropColumn('id_visita');
        });
    }
};
