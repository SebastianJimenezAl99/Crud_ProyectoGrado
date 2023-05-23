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
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idProyecto')->unsigned();
            $table->string('comentario',500);
            $table->decimal('nota', 5, 2);
            $table->timestamps();

            $table->foreign('idProyecto')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calificacions', function (Blueprint $table) {
            $table->dropForeign(['idProyecto']);
        });

        Schema::dropIfExists('calificacions');
    }
};
