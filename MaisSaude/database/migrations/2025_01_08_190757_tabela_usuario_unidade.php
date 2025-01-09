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
        Schema::create('usuario_unidade', function (Blueprint $table) {
            $table->bigIncrements('id'); // Usando bigIncrements
            $table->string('nickname', 40)->index();
            $table->string('nome', 255);
            $table->integer('cd_unidade')->unsigned();
            $table->string('unidade', 255);
            $table->timestamps();

            $table->foreign('cd_unidade')->references('CD_UNIDADE')->on('CAD_UNIDADE')->onDelete('cascade');
            $table->foreign('nickname')->references('NICKNAME')->on('USUARIO')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_unidade');
    }
};
