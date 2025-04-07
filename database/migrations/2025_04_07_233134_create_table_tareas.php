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
        Schema::create('Tareas', function (Blueprint $table) {
            $table->id()->comment('Llave primaria, autoincremental');
            $table->string('titulo',200)->comment('Titulo de la tarea');
            $table->text('descripcion')->nullable()->comment('Descripción de la tarea');
            $table->unsignedBigInteger('fk_estado')->comment('Llave foranea del catálogo de estados');
            $table->unsignedBigInteger('fk_categoria')->comment('Llave foranea del catálogo de categorias');
            $table->unsignedBigInteger('fk_user_asig')->comment('Llave foranea del usuario al cual fue asignada la tarea');
            $table->foreign('fk_estado')->references('id')->on('estados');
            $table->foreign('fk_categoria')->references('id')->on('categorias');
            $table->foreign('fk_user_asig')->references('id')->on('users');
            $table->timestamp('fch_vencimiento')->nullable()->comment('Fecha de vencimiento de la tarea');
            $table->boolean('prioridad')->default(0)->comment('Prioridad de la tarea, puede ser true o false');
            $table->string('user_add')->comment('Usuario que creo la tarea');
            $table->string('user_mod')->comment('Usuario que modifico la tarea');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tareas');
    }
};
