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
        Schema::create('sustentacions', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();//YYYY-MM-DD
            $table->time('hora')->nullable();//HH:MM:SS
            $table->bigInteger('idProyecto')->unsigned()->unique();
            $table->bigInteger('idJurado1')->unsigned();
            $table->bigInteger('idJurado2')->unsigned();
            $table->String('comentario',500);
            $table->String('estado',15);
            $table->timestamps();

            $table->foreign('idProyecto')->references('id')->on('proyectos');
            $table->foreign('idJurado1')->references('id')->on('profesores');
            $table->foreign('idJurado2')->references('id')->on('profesores');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sustentacions', function (Blueprint $table) {
            $table->dropForeign(['idProyecto']);
            $table->dropForeign(['idJurado1']);
            $table->dropForeign(['idJurado2']);
        });

        Schema::dropIfExists('sustentacions');
    }
};
