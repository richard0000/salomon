<?php

use Illuminate\Database\Seeder;

class configuracion_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracion')->insert([
            'clave' => 'iglesia',
            'valor' => 1
        ]);

    }
}
