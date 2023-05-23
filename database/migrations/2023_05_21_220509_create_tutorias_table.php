<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tutorias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();//YYYY-MM-DD
            $table->time('hora')->nullable();//HH:MM:SS
            $table->bigInteger('idProyecto')->unsigned();;
            $table->String('tema',50);
            $table->String('observacion',500);
            $table->String('estado',15);
            $table->timestamps();

            $table->foreign('idProyecto')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tutorias', function (Blueprint $table) {
            $table->dropForeign(['idProyecto']);
        });

        Schema::dropIfExists('tutorias');
    }
};
