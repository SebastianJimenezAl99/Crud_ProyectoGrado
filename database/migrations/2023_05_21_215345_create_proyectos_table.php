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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->string('descripcion', 500);
            $table->string('evidencia', 500);
            $table->bigInteger('idEstudiante_p')->unsigned()->unique();
            $table->bigInteger('idEstudiante_p2')->nullable()->unique()->unsigned();;
            $table->bigInteger('idTutor')->unsigned();;
            $table->string('estado', 15);
            $table->timestamps();

            // Definir las llaves foráneas
            $table->foreign('idEstudiante_p')->references('id')->on('estudiantes');
            $table->foreign('idEstudiante_p2')->references('id')->on('estudiantes');
            $table->foreign('idTutor')->references('id')->on('profesores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropForeign(['idEstudiante_p']);
            $table->dropForeign(['idEstudiante_p2']);
            $table->dropForeign(['idTutor']);
        });

        Schema::dropIfExists('proyectos');
    }
};
