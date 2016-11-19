<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('apellido')->nullable();
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->string('location')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('telefono3')->nullable();
            $table->timestamp('fecha_de_nacimiento')->nullable();
            $table->timestamp('fecha_de_fallecimiento')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->integer('estado_civil')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('activo')->default(true);
            $table->string('foto')->nullable();
            $table->string('email')->nullable();
            /*
            foreign key's (FK's)
            */
            $table->integer('idioma_nativo_id')->nullable();
            /*
            (niño, adolescente, joven, adulto) el categoria es automático con la fecha de nacimiento, se establecen edades límite para cada rango en un ABM de categorias
            */
            $table->integer('ocupacion_id')->unsigned()->nullable();
            $table->integer('territorio_id')->unsigned()->nullable();
            /*
            relaciones con personas en el sistema
            */
            $table->integer('conyugue_id')->unsigned()->nullable();
            $table->integer('padre_id')->unsigned()->nullable();
            $table->integer('madre_id')->unsigned()->nullable();
            $table->integer('hijo_id')->unsigned()->nullable();
            $table->integer('hija_id')->unsigned()->nullable();
            $table->integer('mentor_id')->unsigned()->nullable();

            /*
            referencias de fk's
            */
            $table->foreign('ocupacion_id')->references('id')->on('ocupaciones');
            $table->foreign('territorio_id')->references('id')->on('territorios');
//            $table->foreign('idioma_nativo_id')->references('id')->on('idiomas');            
            $table->foreign('conyugue_id')->references('id')->on('personas');
            $table->foreign('padre_id')->references('id')->on('personas');
            $table->foreign('madre_id')->references('id')->on('personas');
            $table->foreign('hijo_id')->references('id')->on('personas');
            $table->foreign('hija_id')->references('id')->on('personas');
            $table->foreign('mentor_id')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
