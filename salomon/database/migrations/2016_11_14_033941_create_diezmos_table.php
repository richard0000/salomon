<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiezmosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diezmos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('persona_id')->unsigned();
            $table->decimal('importe', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diezmos');
    }
}
