<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIglesiaIdToPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('iglesias')->insert([
            'nombre' => 'Iglesia',
        ]);

        Schema::table('personas', function (Blueprint $table) {
            $table->integer('iglesia_id')->unsigned()->default(1);

            $table->foreign('iglesia_id')->references('id')->on('iglesias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->dropForeign('personas_iglesia_id_foreign');
            $table->dropColumn('iglesia_id');
        });
    }
}
